<?php

namespace App\Console\Commands;

use App\Services\Tooling\Module\DataMembers\DataMember;
use App\Services\Tooling\Module\ModuleCreateService;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ModuleCreatorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:create {name} --columns=true';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create code templates for a module';

    /** @var Collection  */
    private Collection $columns;

    private function hasColumns() :bool
    {
        return $this->input->hasOption('columns') && ($this->input->getOption('columns') == true);
    }

    private function processColumns() :void
    {
        if($this->hasColumns()){
            $this->addColumns();
        }
    }

    private function addColumns() :void
    {
        $addAColumn = true;
        $columns = collect();

        while ($addAColumn){
            $addAColumn = $this->ask('Add a column (Y/N');

            if($addAColumn == Str::lower('y') || $addAColumn == Str::lower('yes')){
                $dataMember = new DataMember();
                $name = $this->ask('Enter column name');
                $dataMember->setName($name);
                $type = $this->ask('set the data type');
                $dataMember->setType($type);
                $nullable = $this->ask('Is the column nullable (Y/N)?');
                $dataMember->setNullable($nullable == Str::lower('y') || $nullable == Str::lower('yes'));
                $setADefault = $this->ask('Set a default value (Y/N)?');

                if(($setADefault == Str::lower('y') || $setADefault == Str::lower('yes'))){
                    $dataMember->setDefault($this->ask('Enter default value:'));
                }

                $this->line(json_encode($dataMember));
                $accepted = $this->ask('Accept output (Y/N)?');
                $verified = $accepted == Str::lower('y') || $accepted == Str::lower('yes');

                if($verified){
                    $columns->add($dataMember);
                }
            } else{
                $addAColumn = false;
            }
        }

        $this->columns = $columns;
    }
    /**
     * Execute the console command.
     *
     * @param ModuleCreateService $service
     * @return int
     */
    public function handle(
        ModuleCreateService $service
    )
    {
        $result = Command::SUCCESS;
        $name = '';
        $created = false;
        $message = '';
        try {
            $name = $this->argument('name');
            $this->processColumns();
            $created = $service->create($name);
            if(!$created){
                throw new \Exception('Error creating module: '.$name);
            }

            $message = 'Module ' . $name . ' created';
        } catch (\Throwable $throwable) {
            $result = Command::FAILURE;
            $message = $throwable->getMessage();
            logger()->channel('stack')->error($throwable->getMessage());
        } finally {
            $method = $created ? 'success' : 'error';
            $this->output->$method($message);
            return $result;
        }
    }
}

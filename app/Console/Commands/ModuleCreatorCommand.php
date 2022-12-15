<?php

namespace App\Console\Commands;

use App\Services\Tooling\Module\ModuleCreateService;
use Illuminate\Console\Command;

class ModuleCreatorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create code templates for a module';

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

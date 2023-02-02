<?php

namespace App\Console\Commands;

use App\Services\Tooling\Export\ExportLogService;
use App\Services\Tooling\Export\JsonTableExporter;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class JsonExport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'json:export {table}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get a json export of a table';

    /**
     * Execute the console command.
     *
     * @param JsonTableExporter $jsonTableExporter
     * @param ExportLogService $exportLogService
     * @return int
     */
    public function handle(
        JsonTableExporter $jsonTableExporter,
        ExportLogService $exportLogService
    )
    {
        $response = Command::SUCCESS;

        try {
            $table = Str::lower($this->argument('table'));

            $success = $jsonTableExporter
                ->setTableName($table)
                ->create();

            if(!$success){
                throw new \Exception('Could not export '.$table.' json');
            }

            $exportLogService->create($table,Carbon::now(),$jsonTableExporter->getRecordsExported());

            $this->output->success('Exported table to file: '.$jsonTableExporter->getFileName());
        } catch (\Throwable $throwable) {
            $this->output->error($throwable->getMessage());
            $response = Command::FAILURE;
        } finally {
            return $response;
        }
    }
}

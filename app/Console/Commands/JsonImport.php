<?php

namespace App\Console\Commands;

use App\Services\Tooling\Import\ImportLogService;
use App\Services\Tooling\Import\JsonTableImporter;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class JsonImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'json:import {table}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import table data from json storage';

    /**
     * Execute the console command.
     *
     * @param JsonTableImporter $importer
     * @param ImportLogService $importLogService
     * @return int
     */
    public function handle(
        JsonTableImporter $importer,
        ImportLogService $importLogService
    )
    {
        $response =  Command::SUCCESS;

        try {
            $tableName = Str::lower($this->argument('table'));

            $imported = $importer->setTableName($tableName)->import();

            if(!$imported){
                throw new \Exception('Table data not imported');
            }

            $importDate = $importer->getImportDate();
            $importCount = $importer->getImported();
            $importLogService->create($tableName,$importDate,$importCount);
            $this->output->success('Table '.$tableName.' imported.');
        } catch (\Throwable $throwable) {
            $this->output->error($throwable->getMessage());
        } finally {
            return $response;
        }
    }
}

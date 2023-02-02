<?php

namespace App\Services\Tooling\Import;

use App\Models\JsonImport;
use Carbon\Carbon;

class ImportLogService
{
    /**
     * @param string $tableName
     * @param Carbon $importDate
     * @param int $count
     * @return JsonImport
     */
    public function create(string $tableName,Carbon $importDate,int $count) :JsonImport
    {
        $import = (new JsonImport());
        $import->table = $tableName;
        $import->import_date = $importDate;
        $import->records_created = $count;
        $import->save();

        return $import;
    }
}

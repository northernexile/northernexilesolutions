<?php

namespace App\Services\Tooling\Export;

use App\Models\JsonExport;
use Carbon\Carbon;

class ExportLogService
{
    public function create(string $table,Carbon $exportDate,int $exportCount) :JsonExport
    {
        $export = new JsonExport();
        $export->table = $table;
        $export->records_exported = $exportCount;
        $export->exported_at = $exportDate;
        $export->save();
        return $export;
    }
}

<?php

namespace App\Services\Tooling\Traits;

use App\Services\Tooling\Export\JsonTableExporter;
use App\Services\Tooling\Interfaces\UsesTableInterface;
use Illuminate\Support\Facades\DB;

trait UsesTableTrait
{
    /** @var string|null  */
    protected ?string $tableName;

    /**
     * @param string $tableName
     * @return UsesTableInterface
     * @throws \Exception
     */
    public function setTableName(string $tableName) :UsesTableInterface
    {
        $this->tableName = $tableName;
        $this->exists();

        return $this;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    private function exists() :bool
    {
        $exists = DB::table($this->tableName)->exists();

        if(!$exists){
            throw new \Exception(UsesTableInterface::TABLE_NOT_FOUND);
        }

        return $exists;
    }
}

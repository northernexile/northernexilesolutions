<?php

namespace App\Services\Tooling\Interfaces;

interface UsesTableInterface
{
    const TABLE_NOT_FOUND = 'Table does not exist for export';
    public function setTableName(string $tableName) :UsesTableInterface;
}

<?php

namespace App\Services\Abstracts;

use Illuminate\Support\Facades\DB;

abstract class AbstractDeleteAllService
{
    /**
     * @var string
     */
    protected string $tableName = '';

    /**
     * @return bool
     * @throws \Exception
     */
    public function truncate() :bool
    {
        if(!$this->tableName){
            throw new \Exception('Table name missing form service while truncating');
        }

        DB::table($this->tableName)->truncate();
        return true;
    }
}

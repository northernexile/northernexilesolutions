<?php

namespace App\Services\Tooling\Module;

use Illuminate\Support\Collection;

interface ModuleCreateInterface
{
    /**
     * @param string $moduleName
     * @return bool
     */
    public function create(string $moduleName) :bool;

    /**
     * @param Collection $columns
     * @return ModuleCreateInterface
     */
    public function setColumns(Collection $columns) :ModuleCreateInterface;
}

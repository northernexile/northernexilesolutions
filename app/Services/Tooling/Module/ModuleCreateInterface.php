<?php

namespace App\Services\Tooling\Module;

interface ModuleCreateInterface
{
    /**
     * @param string $moduleName
     * @return bool
     */
    public function create(string $moduleName) :bool;

    /**
     * @param array $columns
     * @return ModuleCreateInterface
     */
    public function setColumns(array $columns=[]) :ModuleCreateInterface;

    /**
     * @param string $column
     * @return ModuleCreateInterface
     */
    public function addColumn(string $column) :ModuleCreateInterface;
}

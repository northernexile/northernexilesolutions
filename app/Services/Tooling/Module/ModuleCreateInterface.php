<?php

namespace App\Services\Tooling\Module;

interface ModuleCreateInterface
{
    /**
     * @param string $moduleName
     * @return bool
     */
    public function create(string $moduleName) :bool;
}

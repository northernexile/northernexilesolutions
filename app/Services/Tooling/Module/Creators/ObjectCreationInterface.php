<?php

namespace App\Services\Tooling\Module\Creators;

interface ObjectCreationInterface
{
    /**
     * @param string $moduleName
     * @return ObjectCreationInterface
     */
    public function setModuleName(string $moduleName) :ObjectCreationInterface;

    /**
     * @return bool
     */
    public function exists() :bool;

    /**
     * @return bool
     */
    public function create() :bool;
}

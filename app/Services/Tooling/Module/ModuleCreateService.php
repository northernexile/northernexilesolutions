<?php

namespace App\Services\Tooling\Module;

class ModuleCreateService implements ModuleCreateInterface
{
    /** @var bool  */
    protected bool $created = false;

    /**
     * @param string $moduleName
     * @return bool
     */
    public function create(string $moduleName): bool
    {
        return $this->created;
    }
}

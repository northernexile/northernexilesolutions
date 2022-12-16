<?php

namespace App\Services\Tooling\Module;

use Illuminate\Support\Facades\File;

class RoutesCreateService extends AbstractModuleCreationService
{

    /**
     * @return bool
     */
    public function exists(): bool
    {
        $entityStrings = $this->entityStringsService->setIdentifier($this->moduleName);
        $routeFile = $entityStrings->getRoutesFolder().$entityStrings->getModuleNameLowercase().'.php';

        return File::exists($routeFile);
    }

    public function create(): bool
    {
        // TODO: Implement create() method.
    }
}

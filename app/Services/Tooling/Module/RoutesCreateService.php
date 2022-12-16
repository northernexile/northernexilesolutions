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

    /**
     * @return bool
     * @throws \Exception
     */
    public function create(): bool
    {
        $routesTemplate = $this->templateReadService->getRoutesTemplate();
        $template = $this->entityStringsService->setIdentifier($this->moduleName)->apply($routesTemplate);

        return $this->templateWriteService
            ->setFileName($this->entityStringsService->getModuleNameLowercase().'.php')
            ->setPath($this->entityStringsService->getRoutesFolder())
            ->setContent($template)
            ->write();
    }
}

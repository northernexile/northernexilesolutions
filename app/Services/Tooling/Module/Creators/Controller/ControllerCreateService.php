<?php

namespace App\Services\Tooling\Module\Creators\Controller;

use App\Services\Tooling\Module\Creators\AbstractModuleCreationService;

class ControllerCreateService extends AbstractModuleCreationService
{
    /**
     * @return bool
     * @throws \Exception
     */
    public function exists() :bool
    {
        $controllerFQN = $this->entityStringsService
            ->setIdentifier($this->moduleName)
            ->getFullControllerNamespacePath();


        return (class_exists($controllerFQN));
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function create() :bool
    {
        $controllerTemplate = $this->templateReadService
            ->getControllerTemplate();
        $template = $this->entityStringsService->setIdentifier($this->moduleName)->apply($controllerTemplate);

        return $this->templateWriteService
            ->setFileName($this->entityStringsService->getControllerFileName())
            ->setPath($this->entityStringsService->getControllerFilePath())
            ->setContent($template)
            ->write();
    }
}

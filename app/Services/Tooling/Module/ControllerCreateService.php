<?php

namespace App\Services\Tooling\Module;

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


        $exists =  (class_exists($controllerFQN));

        if($exists) {
            throw new \Exception('Controller '.$this->entityStringsService->getControllerName().' already exists');
        }

        return true;
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

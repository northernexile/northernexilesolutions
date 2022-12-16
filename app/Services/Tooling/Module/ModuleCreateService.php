<?php

namespace App\Services\Tooling\Module;


use Exception;

class ModuleCreateService implements ModuleCreateInterface
{
    /** @var bool  */
    protected bool $created = false;
    /** @var ControllerCreateService $controllerCreateService */
    protected ControllerCreateService $controllerCreateService;
    /** @var RequestsCreateService  */
    protected RequestsCreateService $requestsCreateService;
    /** @var ServicesCreateService  */
    protected ServicesCreateService $servicesCreateService;
    /** @var RoutesCreateService  */
    protected RoutesCreateService $routesCreateService;
    /** @var string  */
    protected string $moduleName = '';

    /**
     * @param ControllerCreateService $controllerCreateService
     * @param RequestsCreateService $requestsCreateService
     * @param ServicesCreateService $servicesCreateService
     * @param RoutesCreateService $routesCreateService
     */
    public function __construct(
        ControllerCreateService $controllerCreateService,
        RequestsCreateService $requestsCreateService,
        ServicesCreateService $servicesCreateService,
        RoutesCreateService $routesCreateService
    )
    {
        $this->controllerCreateService = $controllerCreateService;
        $this->requestsCreateService = $requestsCreateService;
        $this->servicesCreateService = $servicesCreateService;
        $this->routesCreateService = $routesCreateService;
    }

    /**
     * @param string $moduleName
     * @return bool
     * @throws Exception
     */
    public function create(string $moduleName): bool
    {
        $this->moduleName = $moduleName;
        $validated = $this->validate();
        $requestsService = null;
        $servicesService = null;
        $routesService = null;

        if($validated){
            $createdController = $this->controllerCreateService->setModuleName($this->moduleName)->create();
            $this->created = $createdController;

            if($this->created){
                $requestsService = $this->requestsCreateService->setModuleName($this->moduleName);
                $this->created = $requestsService->exists();
            }

            if($this->created){
                $this->created = $requestsService->create();
            }

            if($this->created){
                $servicesService = $this->servicesCreateService->setModuleName($this->moduleName);
                $this->created = $servicesService->exists();
            }

            if($this->created){
                $this->created = $servicesService->create();
            }

            if($this->created){
                $routesService = $this->routesCreateService->setModuleName($this->moduleName);
                $this->created = $routesService->exists();
            }

            if($this->created){
                $this->created = $routesService->create();
            }
        }

        return $this->created;
    }

    /**
     * @return bool
     * @throws Exception
     */
    private function validate() :bool
    {
        return (
            $this->controllerCreateService
            ->setModuleName($this->moduleName)
            ->exists()
        );
    }
}

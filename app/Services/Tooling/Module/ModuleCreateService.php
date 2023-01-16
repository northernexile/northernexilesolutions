<?php

namespace App\Services\Tooling\Module;


use App\Services\Tooling\Module\Creators\Controller\ControllerCreateService;
use App\Services\Tooling\Module\Creators\Requests\RequestsCreateService;
use App\Services\Tooling\Module\Creators\Routes\RoutesCreateService;
use App\Services\Tooling\Module\Creators\Services\ServicesCreateService;
use App\Services\Tooling\Module\Creators\Model\ModelCreateService;

use Exception;

class ModuleCreateService implements ModuleCreateInterface
{
    /** @var ControllerCreateService $controllerCreateService */
    protected ControllerCreateService $controllerCreateService;
    /** @var RequestsCreateService  */
    protected RequestsCreateService $requestsCreateService;
    /** @var ServicesCreateService  */
    protected ServicesCreateService $servicesCreateService;
    /** @var RoutesCreateService  */
    protected RoutesCreateService $routesCreateService;
    /** @var ModelCreateService  */
    protected ModelCreateService $modelCreateService;
    /** @var string  */
    protected string $moduleName = '';

    /** @var array|string[]  */
    protected array $columns = ['id'];

    /**
     * @param ControllerCreateService $controllerCreateService
     * @param RequestsCreateService $requestsCreateService
     * @param ServicesCreateService $servicesCreateService
     * @param RoutesCreateService $routesCreateService
     * @param ModelCreateService $modelCreateService
     */
    public function __construct(
        ControllerCreateService $controllerCreateService,
        RequestsCreateService $requestsCreateService,
        ServicesCreateService $servicesCreateService,
        RoutesCreateService $routesCreateService,
        ModelCreateService $modelCreateService
    )
    {
        $this->controllerCreateService = $controllerCreateService;
        $this->requestsCreateService = $requestsCreateService;
        $this->servicesCreateService = $servicesCreateService;
        $this->routesCreateService = $routesCreateService;
        $this->modelCreateService = $modelCreateService;
    }

    /**
     * @param array $columns
     * @return ModuleCreateInterface
     */
    public function setColumns(array $columns = []) :ModuleCreateInterface
    {
        $this->columns = $columns;
        return $this;
    }

    /**
     * @param string $column
     * @return ModuleCreateInterface
     */
    public function addColumn(string $column): ModuleCreateInterface
    {
        if(!in_array($column,$this->columns)){
            $this->columns[] = $column;
        }

        return $this;
    }

    /**
     * @param string $moduleName
     * @return bool
     * @throws Exception
     */
    public function create(string $moduleName): bool
    {
        $this->moduleName = $moduleName;
        $this->createController()
            ->createRequests()
            ->createServices()
            ->createRoutes()
            ->createModel();

        return true;
    }

    /**
     * @return $this
     * @throws Exception
     */
    private function createController() :self
    {
        $created = $this->controllerCreateService->setModuleName($this->moduleName)->exists();

        if(!$created) {
            $created = $this->controllerCreateService->setModuleName($this->moduleName)->create();
        }

        if(!$created){
            throw new \Exception('Controller could not be created');
        }

        return $this;
    }

    /**
     * @return $this
     * @throws Exception
     */
    private function createRequests() :self
    {
        $requestsService = $this->requestsCreateService->setModuleName($this->moduleName);
        $created = $requestsService->exists();
        $created = $requestsService->create();

        if(!$created) {
            throw new \Exception('Could not create module requests suite');
        }

        return $this;
    }

    /**
     * @return $this
     * @throws Exception
     */
    private function createServices() :self
    {
        $servicesService = $this->servicesCreateService->setModuleName($this->moduleName);
        $created = $servicesService->exists();
        $created = $servicesService->create();


        if(!$created) {
            throw new \Exception('Could not create module services suite');
        }

        return $this;
    }

    /**
     * @return $this
     * @throws Exception
     */
    private function createRoutes() :self
    {
        $routesService = $this->routesCreateService->setModuleName($this->moduleName);
        $created = $routesService->exists();
        if(!$created){
            $created = $routesService->create();
        }

        if(!$created){
            throw new \Exception('Could not create module route');
        }

        return $this;
    }

    /**
     * @return $this
     * @throws Exception
     */
    private function createModel() :self
    {
        $modelService = $this->modelCreateService->setModuleName($this->moduleName);
        $created = $modelService->exists();

        if(!$created){
            $created = $modelService->create();
        }

        if(!$created){
            throw new \Exception('Could not create module model');
        }

        return $this;
    }
}

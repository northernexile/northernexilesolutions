<?php

namespace App\Services\Tooling\Module;

use Illuminate\Support\Facades\File;

class TemplateReadService
{
    /** @var string  */
    private string $controllerTemplate = 'app/Templates/Http/Controllers/ControllerModule.tpl';
    /** @var string */
    private string $routesTemplate = 'app/Templates/Routes/route.tpl';
    /** @var string  */
    private string $requestTemplatesPath = 'app/Templates/Http/Requests/';
    /** @var string  */
    private string $servicesTemplatesPath = 'app/Templates/Services';

    public const CREATE = 'Create';
    public const DELETE_ALL = 'DeleteAll';
    public const DELETE = 'Delete';
    public const LIST = 'List';
    public const SEARCH = 'Search';
    public const UPDATE = 'Update';
    public const VIEW = 'View';
    public const SAVE = 'Save';

    /**
     * @var array|string[]
     */
    private array $requestTemplates = [
        self::CREATE,
        self::DELETE_ALL,
        self::DELETE,
        self::LIST,
        self::SEARCH,
        self::UPDATE,
        self::VIEW
    ];

    /**
     * @var array|string[]
     */
    private array $servicesTemplates = [
        self::SAVE,
        self::DELETE_ALL,
        self::DELETE,
        self::LIST,
        self::SEARCH,
        self::VIEW
    ];

    /**
     * @return string
     */
    public function getControllerTemplate() :string
    {
        return $this->getFile($this->controllerTemplate);
    }

    /**
     * @return string
     */
    public function getRoutesTemplate() :string
    {
        return $this->getFile($this->routesTemplate);
    }

    /**
     * @param string $path
     * @return string
     */
    protected function getFile(string $path) :string
    {
        return File::get($path);
    }

    /**
     * @return array
     */
    public function getRequestTemplates() :array
    {
        $config = [];
        $path = $this->requestTemplatesPath;
        foreach ($this->requestTemplates as $requestTemplate){
            $config[$requestTemplate] = $this->getFile($path.$requestTemplate.'Request.tpl');
        }

        return $config;
    }

    /**
     * @return array
     */
    public function getServicesTemplates() :array
    {
        $config = [];
        $path = $this->servicesTemplatesPath;
        foreach ($this->servicesTemplates as $serviceTemplate){
            $config[$serviceTemplate] = $this->getFile($path.'/'.$serviceTemplate.'Service.tpl');
        }

        return $config;
    }
}

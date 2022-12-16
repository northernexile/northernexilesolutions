<?php

namespace App\Services\Tooling\Module;

class AbstractModuleCreationService implements ObjectCreationInterface
{
    /** @var string  */
    protected string $moduleName = '';
    /** @var EntityStringsService  */
    protected EntityStringsService $entityStringsService;
    /** @var TemplateReadService  */
    protected TemplateReadService $templateReadService;
    /** @var TemplateWriteService  */
    protected TemplateWriteService $templateWriteService;

    /**
     * @param EntityStringsService $entityStringsService
     * @param TemplateReadService $templateReadService
     * @param TemplateWriteService $templateWriteService
     */
    public function __construct(
        EntityStringsService $entityStringsService,
        TemplateReadService $templateReadService,
        TemplateWriteService $templateWriteService
    )
    {
        $this->entityStringsService = $entityStringsService;
        $this->templateReadService = $templateReadService;
        $this->templateWriteService = $templateWriteService;
    }

    /**
     * @return bool
     */
    abstract public function exists(): bool;

    /**
     * @return bool
     */
    abstract public function create():bool;

    /**
     * @param string $moduleName
     * @return ObjectCreationInterface
     */
    public function setModuleName(string $moduleName): ObjectCreationInterface
    {
        $this->moduleName = $moduleName;
        return $this;
    }
}

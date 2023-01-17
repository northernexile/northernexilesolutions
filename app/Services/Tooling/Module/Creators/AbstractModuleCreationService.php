<?php

namespace App\Services\Tooling\Module\Creators;

use App\Services\Tooling\Module\DataMembers\DataMember;
use App\Services\Tooling\Module\DataMembers\DataTypes;
use App\Services\Tooling\Module\Template\Read\TemplateReadService;
use App\Services\Tooling\Module\Template\Write\TemplateWriteService;
use App\Services\Tooling\Module\Utilities\ColumnsToTextService;
use App\Services\Tooling\Module\Utilities\EntityStringsService;
use Illuminate\Support\Collection;

abstract class AbstractModuleCreationService implements ObjectCreationInterface
{
    /** @var string  */
    protected string $moduleName = '';
    /** @var EntityStringsService  */
    protected EntityStringsService $entityStringsService;
    /** @var TemplateReadService  */
    protected TemplateReadService $templateReadService;
    /** @var TemplateWriteService  */
    protected TemplateWriteService $templateWriteService;

    /** @var ColumnsToTextService  */
    protected ColumnsToTextService $columnsToTextService;

    /**
     * @var Collection
     */
    protected Collection $columns;

    /**
     * @param EntityStringsService $entityStringsService
     * @param TemplateReadService $templateReadService
     * @param TemplateWriteService $templateWriteService
     * @param ColumnsToTextService $columnsToTextService
     */
    public function __construct(
        EntityStringsService $entityStringsService,
        TemplateReadService $templateReadService,
        TemplateWriteService $templateWriteService,
        ColumnsToTextService $columnsToTextService
    )
    {
        $this->entityStringsService = $entityStringsService;
        $this->templateReadService = $templateReadService;
        $this->templateWriteService = $templateWriteService;
        $this->columnsToTextService = $columnsToTextService;
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

    public function setColumns(Collection $columns) :ObjectCreationInterface
    {
        if($columns->isEmpty() || !$columns->has('id')){
            $item = (new DataMember())
                ->setType(DataTypes::ID)
                ->setName('id')
                ->setNullable(false);

            $columns->add($item);
        }

        $this->columns = $columns;

        return $this;
    }
}

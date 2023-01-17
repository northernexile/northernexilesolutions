<?php

namespace App\Services\Tooling\Module\Creators\Model;

use App\Services\Tooling\Module\Creators\AbstractModuleCreationService;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ModelCreateService extends AbstractModuleCreationService
{
    /**
     * @return bool
     */
    public function exists(): bool
    {
        $entityStrings = $this->entityStringsService->setIdentifier($this->moduleName);
        $model = $entityStrings->getModelName();
        $namespace = $entityStrings->getModelNamespace();
        return class_exists($namespace.$model);
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function create(): bool
    {
        $modelTemplate = $this->templateReadService->getModelTemplate();
        $template = $this->entityStringsService->setIdentifier($this->moduleName)->apply($modelTemplate);
        $columns = $this->columnsToTextService->setColumns($this->columns)->getForModels();
        $template = Str::replace(
            '[Properties]',
            $columns['properties'],
            $template
        );
        $template = Str::replace(
            '[Fillable]',
            $columns['fillable'],
            $template
        );

        return $this->templateWriteService
            ->setFileName($this->entityStringsService->getModelName().'.php')
            ->setPath($this->entityStringsService->getModelFilePath())
            ->setContent($template)
            ->write();
    }
}

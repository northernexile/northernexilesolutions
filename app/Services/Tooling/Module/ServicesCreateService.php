<?php

namespace App\Services\Tooling\Module;

use Illuminate\Support\Facades\File;

class ServicesCreateService extends AbstractModuleCreationService
{

    public function exists(): bool
    {
        $entityStrings = $this->entityStringsService->setIdentifier($this->moduleName);
        $serviceFolder = $entityStrings->getServicesFilePath() . $entityStrings->getModuleDirectoryName();
        $exists = (File::exists($serviceFolder));

        if (!$exists) {
            $exists = File::makeDirectory($serviceFolder);
        }

        return $exists;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function create(): bool
    {
        $entityStrings = $this->entityStringsService->setIdentifier($this->moduleName);
        $templates = $this->templateReadService->getServicesTemplates();
        $path = $entityStrings->getServicesFilePath().$entityStrings->getModuleDirectoryName().'/';
        $services = [
            ['fileName'=>$entityStrings->getSaveServiceFileName(),'template'=>$templates[TemplateReadService::SAVE]],
            ['fileName'=>$entityStrings->getDeleteAllServiceFileName(),'template'=>$templates[TemplateReadService::DELETE_ALL]],
            ['fileName'=>$entityStrings->getDeleteServiceFileName(),'template'=>$templates[TemplateReadService::DELETE]],
            ['fileName'=>$entityStrings->getListServiceFileName(),'template'=>$templates[TemplateReadService::LIST]],
            ['fileName'=>$entityStrings->getSearchServiceFileName(),'template'=>$templates[TemplateReadService::SEARCH]],
            ['fileName'=>$entityStrings->getViewServiceFileName(),'template'=>$templates[TemplateReadService::VIEW]],
        ];

        foreach ($services as $service){
            $itemTemplate = $service['template'];
            $fileName = $service['fileName'];
            $content = $entityStrings->apply($itemTemplate);
            $written =$this->templateWriteService
                ->setContent($content)
                ->setFileName($fileName.'.php')
                ->setPath($path)
                ->write();

            if(!$written){
                throw new \Exception('Cannot write services file');
            }
        }
        return true;
    }
}

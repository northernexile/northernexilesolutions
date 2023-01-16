<?php

namespace App\Services\Tooling\Module\Creators\Requests;

use App\Services\Tooling\Module\Creators\AbstractModuleCreationService;
use App\Services\Tooling\Module\Template\Read\TemplateReadService;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class RequestsCreateService extends AbstractModuleCreationService
{
    /**
     * @return bool
     */
    public function exists(): bool
    {
        $entityStrings = $this->entityStringsService->setIdentifier($this->moduleName);
        $requestFolder = $entityStrings->getRequestsFilePath() . $entityStrings->getModuleDirectoryName();
        $exists = (File::exists($requestFolder));

        if (!$exists) {
            $exists = File::makeDirectory($requestFolder);
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
        $templates = $this->templateReadService->getRequestTemplates();
        $path = $entityStrings->getRequestsFilePath().$entityStrings->getModuleDirectoryName().'/';
        $requests = [
            ['fileName'=>$entityStrings->getCreateRequestFileName(),'template'=>$templates[TemplateReadService::CREATE]],
            ['fileName'=>$entityStrings->getDeleteAllRequestFileName(),'template'=>$templates[TemplateReadService::DELETE_ALL]],
            ['fileName'=>$entityStrings->getDeleteRequestFileName(),'template'=>$templates[TemplateReadService::DELETE]],
            ['fileName'=>$entityStrings->getListRequestFileName(),'template'=>$templates[TemplateReadService::LIST]],
            ['fileName'=>$entityStrings->getSearchRequestFileName(),'template'=>$templates[TemplateReadService::SEARCH]],
            ['fileName'=>$entityStrings->getUpdateRequestFileName(),'template'=>$templates[TemplateReadService::UPDATE]],
            ['fileName'=>$entityStrings->getViewRequestFileName(),'template'=>$templates[TemplateReadService::VIEW]],
        ];

        foreach ($requests as $request){
            $itemTemplate = $request['template'];
            $fileName = $request['fileName'];
            $content = $entityStrings->apply($itemTemplate);
            $content =
                Str::replace(
                    '[Columns]',
                    $this->columnsToTextService->setColumns($this->columns)->getForRequests(),
                    $content
                );
            $written =$this->templateWriteService
                ->setContent($content)
                ->setFileName($fileName.'.php')
                ->setPath($path)
                ->write();

            if(!$written){
                throw new \Exception('Cannot write request file');
            }
        }

        return true;
    }
}

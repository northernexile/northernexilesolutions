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

    public function create(): bool
    {

    }
}

<?php

namespace App\Services\Tooling\Module\Creators\Model;

use App\Services\Tooling\Module\Creators\AbstractModuleCreationService;

class ModelCreateService extends AbstractModuleCreationService
{

    /**
     * @return bool
     */
    public function exists(): bool
    {
        return false;
    }

    /**
     * @return bool
     */
    public function create(): bool
    {
        return false;
    }
}

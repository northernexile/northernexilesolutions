<?php

namespace App\Services\Service;

use App\Models\Service;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class ServiceDeleteService implements IdentifiableInterface
{
    use IdentifiableTrait;

    /**
     * @return bool
     */
    public function delete() :bool
    {
        $service = Service::findOrFail($this->identity);
        $service->delete();
        return true;
    }
}

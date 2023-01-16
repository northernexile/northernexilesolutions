<?php

namespace App\Services\Service;

use App\Models\Service;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class ServiceViewService implements IdentifiableInterface
{
    use IdentifiableTrait;
    /**
     * @return Service
     */
    public function get() :Service
    {
        return Service::findOrFail($this->identity);
    }
}

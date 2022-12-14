<?php

namespace App\Services\Abstracts;

abstract class AbstractSaveService
{
    /**
     * @var array
     */
    protected array $properties = [];

    /**
     * @param bool $create
     * @return mixed
     */
    abstract public function getEntity(bool $create = true);
}

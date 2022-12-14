<?php

namespace App\Services\Abstracts;

trait PropertiesTrait
{
    /**
     * @var array
     */
    protected array $properties = [];
    /**
     * @param array $properties
     * @return PropertiesInterface
     */
    public function setProperties(array $properties = []) :PropertiesInterface
    {
        $this->properties = $properties;
        return $this;
    }
}

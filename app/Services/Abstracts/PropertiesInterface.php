<?php

namespace App\Services\Abstracts;

interface PropertiesInterface
{
    /**
     * @param array $properties
     * @return PropertiesInterface
     */
    public function setProperties(array $properties = []) :PropertiesInterface;
}

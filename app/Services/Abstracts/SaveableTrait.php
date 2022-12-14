<?php

namespace App\Services\Abstracts;

trait SaveableTrait
{
    /** @var array  */
    protected array $properties = [];
    /**
     * @return bool
     */
    public function save() :bool
    {
        $entity = $this->getEntity();
        $keys = array_keys($this->properties);
        foreach ($keys as $key) {
            $entity->$key = $this->properties[$key];
        }

        $entity->save();

        return true;
    }
}

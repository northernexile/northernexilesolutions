<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Collection;

trait IndexedModelArrayTrait
{    /**
 * @param Collection $collection
 * @return array
 */
    public static function getIndexedKeyArray(Collection $collection) :array
    {
        $indexed = [];

        foreach ($collection as $object){
            $indexed[$object->id] = $object->name;
        }

        return $indexed;
    }

    /**
     * @param Collection $collection
     * @return array
     */
    public static function getIndexedValueArray(Collection $collection) :array
    {
        return array_flip(self::getIndexedKeyArray($collection));
    }
}

<?php

namespace App\Services\Tag;

use App\Models\Tag;
use App\Services\Abstracts\AbstractSaveService;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;
use App\Services\Abstracts\PropertiesTrait;
use App\Services\Abstracts\SaveableTrait;

class TagSaveService extends AbstractSaveService implements IdentifiableInterface
{
    use IdentifiableTrait;
    use PropertiesTrait;
    use SaveableTrait;

    /**
     * @param bool $create
     * @return Tag|null
     */
    public function getEntity(bool $create = true) :?Content
    {
        if(!is_null($this->identity)){
            $result = Tag::findOrFail($this->identity);
        } else {
            $result = ($create) ? new Tag() : null;
        }

        return $result;
    }
}

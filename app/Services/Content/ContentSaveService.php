<?php

namespace App\Services\Content;

use App\Models\Content;
use App\Services\Abstracts\AbstractSaveService;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;
use App\Services\Abstracts\PropertiesTrait;
use App\Services\Abstracts\SaveableTrait;

class ContentSaveService extends AbstractSaveService implements IdentifiableInterface
{
    use IdentifiableTrait;
    use PropertiesTrait;
    use SaveableTrait;

    /**
     * @param bool $create
     * @return Content|null
     */
    public function getEntity(bool $create = true) :?Content
    {
        if(!is_null($this->identity)){
            $result = Content::findOrFail($this->identity);
        } else {
            $result = ($create) ? new Content() : null;
        }

        return $result;
    }
}

<?php

namespace App\Services\Page;

use App\Models\Page;
use App\Services\Abstracts\AbstractSaveService;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;
use App\Services\Abstracts\PropertiesTrait;
use App\Services\Abstracts\SaveableTrait;
use Illuminate\Support\Str;

class PageSaveService extends AbstractSaveService implements IdentifiableInterface
{
    use IdentifiableTrait;
    use PropertiesTrait;
    use SaveableTrait;

    /**
     * @return bool
     */
    public function save(): bool
    {
        $entity = $this->getEntity();
        $keys = array_keys($this->properties);
        $this->properties['slug'] = Str::slug($this->properties['name']);
        foreach ($keys as $key) {
            $entity->$key = $this->properties[$key];
        }

        $entity->save();

        return true;
    }

    /**
     * @param bool $create
     * @return Page|null
     */
    public function getEntity(bool $create = true) :?Page
    {
        if(!is_null($this->identity)){
            $result = Page::findOrFail($this->identity);
        } else {
            $result = ($create) ? new Page() : null;
        }

        return $result;
    }
}

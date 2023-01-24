<?php

namespace App\Services\Contact;

use App\Models\Contact;
use App\Services\Abstracts\AbstractSaveService;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;
use App\Services\Abstracts\PropertiesInterface;
use App\Services\Abstracts\PropertiesTrait;
use App\Services\Abstracts\SaveableTrait;

class ContactSaveService extends AbstractSaveService implements IdentifiableInterface,PropertiesInterface
{
    use IdentifiableTrait;
    use PropertiesTrait;
    use SaveableTrait;

    /**
     * @param bool $create
     * @return Contact|null
     */
    public function getEntity(bool $create = true) :?Contact
    {
        if(!is_null($this->identity)){
            $result = Contact::findOrFail($this->identity);
        } else {
            $result = ($create) ? new Contact() : null;
        }

        return $result;
    }
}

<?php

namespace App\Services\Contact;

use App\Models\Contact;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class ContactDeleteService implements IdentifiableInterface
{
    use IdentifiableTrait;

    /**
     * @return bool
     */
    public function delete() :bool
    {
        $contact = Contact::findOrFail($this->identity);
        $contact->delete();
        return true;
    }
}

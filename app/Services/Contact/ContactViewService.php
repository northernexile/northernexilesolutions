<?php

namespace App\Services\Contact;

use App\Models\Contact;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class ContactViewService implements IdentifiableInterface
{
    use IdentifiableTrait;
    /**
     * @return Contact
     */
    public function get() :Contact
    {
        return Contact::findOrFail($this->identity);
    }
}

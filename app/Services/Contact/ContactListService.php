<?php

namespace App\Services\Contact;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;

class ContactListService
{
    /**
     * @param array $columns
     * @return Collection
     */
    public function getList(array $columns=['id','name','text','email','created_at']) :Collection
    {
        return Contact::get($columns);
    }
}

<?php

namespace App\Services\Contact;

use App\Services\Abstracts\AbstractDeleteAllService;

final class ContactDeleteAllService extends AbstractDeleteAllService
{
    /** @var string  */
    protected string $tableName = 'contact';
}

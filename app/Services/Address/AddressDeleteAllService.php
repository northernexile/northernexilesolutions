<?php

namespace App\Services\Address;

use App\Services\Abstracts\AbstractDeleteAllService;

final class AddressDeleteAllService extends AbstractDeleteAllService
{
    /** @var string  */
    protected string $tableName = 'address';
}

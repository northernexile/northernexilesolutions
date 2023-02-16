<?php

namespace App\Services\ClientAddress;

use App\Services\Abstracts\AbstractDeleteAllService;

final class ClientAddressDeleteAllService extends AbstractDeleteAllService
{
    /** @var string  */
    protected string $tableName = 'clientaddress';
}

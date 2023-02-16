<?php

namespace App\Services\Client;

use App\Services\Abstracts\AbstractDeleteAllService;

final class ClientDeleteAllService extends AbstractDeleteAllService
{
    /** @var string  */
    protected string $tableName = 'client';
}

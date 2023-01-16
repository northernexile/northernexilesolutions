<?php

namespace App\Services\Service;

use App\Services\Abstracts\AbstractDeleteAllService;

final class ServiceDeleteAllService extends AbstractDeleteAllService
{
    /** @var string  */
    protected string $tableName = 'service';
}

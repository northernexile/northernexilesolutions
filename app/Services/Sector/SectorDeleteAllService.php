<?php

namespace App\Services\Sector;

use App\Services\Abstracts\AbstractDeleteAllService;

final class SectorDeleteAllService extends AbstractDeleteAllService
{
    /** @var string  */
    protected string $tableName = 'sectors';
}

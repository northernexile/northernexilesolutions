<?php

namespace App\Services\ExperienceSector;

use App\Services\Abstracts\AbstractDeleteAllService;

final class ExperienceSectorDeleteAllService extends AbstractDeleteAllService
{
    /** @var string  */
    protected string $tableName = 'experience_sector';
}

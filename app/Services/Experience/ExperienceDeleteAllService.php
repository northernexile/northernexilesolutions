<?php

namespace App\Services\Experience;

use App\Services\Abstracts\AbstractDeleteAllService;

final class ExperienceDeleteAllService extends AbstractDeleteAllService
{
    /** @var string  */
    protected string $tableName = 'experience';
}

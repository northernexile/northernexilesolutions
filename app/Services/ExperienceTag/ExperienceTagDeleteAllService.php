<?php

namespace App\Services\ExperienceTag;

use App\Services\Abstracts\AbstractDeleteAllService;

final class ExperienceTagDeleteAllService extends AbstractDeleteAllService
{
    /** @var string  */
    protected string $tableName = 'experience_tags';
}

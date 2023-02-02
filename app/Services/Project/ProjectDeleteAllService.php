<?php

namespace App\Services\Project;

use App\Services\Abstracts\AbstractDeleteAllService;

final class ProjectDeleteAllService extends AbstractDeleteAllService
{
    /** @var string  */
    protected string $tableName = 'projects';
}

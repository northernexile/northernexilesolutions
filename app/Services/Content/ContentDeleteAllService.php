<?php

namespace App\Services\Content;

use App\Services\Abstracts\AbstractDeleteAllService;

final class ContentDeleteAllService extends AbstractDeleteAllService
{
    /** @var string  */
    protected string $tableName = 'content';
}

<?php

namespace App\Services\Tag;

use App\Services\Abstracts\AbstractDeleteAllService;

final class TagDeleteAllService extends AbstractDeleteAllService
{
    /** @var string  */
    protected string $tableName = 'tags';
}

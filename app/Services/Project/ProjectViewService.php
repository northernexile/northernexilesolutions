<?php

namespace App\Services\Project;

use App\Models\Project;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class ProjectViewService implements IdentifiableInterface
{
    use IdentifiableTrait;
    /**
     * @return Project
     */
    public function get() :Project
    {
        return Project::findOrFail($this->identity);
    }
}

<?php

namespace App\Services\Project;

use App\Models\Project;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class ProjectDeleteService implements IdentifiableInterface
{
    use IdentifiableTrait;

    /**
     * @return bool
     */
    public function delete() :bool
    {
        $project = Project::findOrFail($this->identity);
        $project->delete();
        return true;
    }
}

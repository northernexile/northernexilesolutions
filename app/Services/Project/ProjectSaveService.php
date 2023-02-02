<?php

namespace App\Services\Project;

use App\Models\Project;
use App\Services\Abstracts\AbstractSaveService;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;
use App\Services\Abstracts\PropertiesTrait;
use App\Services\Abstracts\SaveableTrait;

class ProjectSaveService extends AbstractSaveService implements IdentifiableInterface
{
    use IdentifiableTrait;
    use PropertiesTrait;
    use SaveableTrait;

    /**
     * @param bool $create
     * @return Project|null
     */
    public function getEntity(bool $create = true) :?Content
    {
        if(!is_null($this->identity)){
            $result = Project::findOrFail($this->identity);
        } else {
            $result = ($create) ? new Project() : null;
        }

        return $result;
    }
}

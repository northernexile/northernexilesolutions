<?php

namespace App\Services\Project;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

class ProjectListService
{
    const COLUMNS = ['id','experience_id','description','created_at','updated_at'];
    public function getListByExperienceId(int $experienceId,array $columns = self::COLUMNS): Collection
    {
        return Project::where('experience_id','=',$experienceId)
            ->orderBy('id','asc')
            ->get($columns);
    }
    /**
     * @param array $columns
     * @return Collection
     */
    public function getList(array $columns=self::COLUMNS) :Collection
    {
        return Project::orderBy('id','asc')->get($columns);
    }
}

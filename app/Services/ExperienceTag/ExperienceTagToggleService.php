<?php

namespace App\Services\ExperienceTag;

use App\Models\Experience;
use App\Models\ExperienceTag;
use App\Models\Tag;

class ExperienceTagToggleService
{
    private int $experienceId;

    private int $tagId;

    /**
     * @param int $experienceId
     * @return ExperienceTagToggleService
     */
    public function setExperienceId(int $experienceId): ExperienceTagToggleService
    {
        $this->experienceId = $experienceId;
        return $this;
    }

    /**
     * @param int $tagId
     * @return ExperienceTagToggleService
     */
    public function setTagId(int $tagId): ExperienceTagToggleService
    {
        $this->tagId = $tagId;
        return $this;
    }

    /**
     * @return ExperienceTag
     */
    public function toggle() :ExperienceTag
    {
        $experience = Experience::findOrFail($this->experienceId);
        $tag = Tag::findOrFail($this->tagId);
        $experienceTag = ExperienceTag::where('experience_id','=',$experience->id)
            ->where('tag_id','=',$tag->id)
            ->first();

        if(!is_null($experienceTag)){
            $experienceTag->delete();
            return $experienceTag;
        }

        $experienceTag = new ExperienceTag();
        $experienceTag->experience_id = $experience->id;
        $experienceTag->tag_id = $tag->id;
        return $experienceTag;
    }
}

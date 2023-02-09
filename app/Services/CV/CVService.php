<?php

namespace App\Services\CV;

use App\Models\Experience;
use App\Models\ExperienceSector;
use App\Models\ExperienceSkill;
use App\Models\ExperienceTag;
use App\Models\Project;
use App\Models\Sector;
use App\Models\Skill;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class CVService
{
    public function getCV() :\Illuminate\Support\Collection
    {
        $collection = collect();
        $experiences = $this->getExperience();

        foreach ($experiences as $experience){
            $item = new \stdClass();
            $item->title = $experience->title;
            $item->company = $experience->company;
            $item->projects = $this->getExperienceProjects($experience->id);
            $item->startMonthYear = Carbon::parse($experience->start)->format('M Y');
            $item->endMonthYear = (is_null($experience->stop))
                ? 'Current'
                : Carbon::parse($experience->stop)->format('M Y');
            $item->chips = $this->getChipCollection($experience);

            $collection->add($item);
        }

        return $collection;
    }



    private function getChipCollection(Experience $experience) :\Illuminate\Support\Collection
    {
        $chipCollection = collect();
        $chipCollection = $this->resolveSkills($chipCollection,$experience);
        $chipCollection = $this->resolveTags($chipCollection,$experience);
        return $this->resolveSectors($chipCollection,$experience);
    }

    private function resolveSectors(
        \Illuminate\Support\Collection $collection,
        Experience $experience
    ) :\Illuminate\Support\Collection
    {
        $experienceSectors = $this->getExperienceSectors($experience->id);
        $sectors = $this->getSectors();

        foreach ($experienceSectors as $sector){
            $collection = $this->resolve($collection,$sectors,$sector->sector_id);
        }

        return $collection;
    }

    private function resolveTags(
        \Illuminate\Support\Collection $collection,
        Experience $experience
    ) :\Illuminate\Support\Collection
    {
        $experienceTags = $this->getExperienceTags($experience->id);
        $tags = $this->getTags();

        foreach ($experienceTags as $tag){
            $collection = $this->resolve($collection,$tags,$tag->tag_id);
        }

        return $collection;
    }

    private function resolve(
        \Illuminate\Support\Collection $collection,
        Collection $list,
        int $identifier
    ) :\Illuminate\Support\Collection
    {
        $name = $this->getObjectName($list,$identifier);
        $collectionHasKey = $collection->contains(function ($chip) use ($name){
            return $chip->name = $name;
        });

        if(!$collectionHasKey){
            $item = new \stdClass();
            $item->name = $name;
            $collection->add($item);
        }

        return $collection;
    }

    private function resolveSkills(
        \Illuminate\Support\Collection $collection,
        Experience $experience
    ) :\Illuminate\Support\Collection
    {
        $experienceSkills = $this->getExperienceSkills($experience->id);
        $skills = $this->getSkills();

        foreach ($experienceSkills as $skill){
            $collection = $this->resolve($collection,$skills,$skill->skill_id);
        }

        return $collection;
    }

    private function getObjectName(Collection $list,int $id) :string
    {
        return $list->filter(function ($l) use($id){
            return $l->id == $id;
        })->first()->name;
    }

    private function getExperienceSkills(int $experienceId) :Collection
    {
        return ExperienceSkill::where('experience_id','=',$experienceId)->get();
    }

    private function getExperienceTags(int $experienceId) :Collection
    {
        return ExperienceTag::where('experience_id','=',$experienceId)->get();
    }

    private function getExperienceSectors(int $experienceId):Collection
    {
        return ExperienceSector::where('experience_id','=',$experienceId)->get();
    }

    /**
     * @param int $experienceId
     * @return Collection
     */
    private function getExperienceProjects(int $experienceId) :Collection
    {
        return Project::where('experience_id','=',$experienceId)->get();
    }

    /**
     * @return Collection
     */
    private function getExperience() :Collection
    {
        return Experience::orderByDesc('start')->get();
    }

    /**
     * @return Collection
     */
    private function getSkills() :Collection
    {
        return Skill::get(['id','name']);
    }

    private function getSectors() :Collection
    {
        return Sector::get(['id','name']);
    }

    private function getTags() :Collection
    {
        return Tag::get(['id','name']);
    }
}

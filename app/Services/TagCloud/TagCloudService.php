<?php

namespace App\Services\TagCloud;

use App\Models\Sector;
use App\Models\Skill;
use Illuminate\Support\Collection;

class TagCloudService
{
    const MIN_TAG_SIZE = 10;
    const MAX_TAG_SIZE = 39;
    /**
     * @return Collection
     * @throws \Exception
     */
    public function getCloud() :Collection
    {
        $items = collect();
        foreach ($this->getTechnologies() as $technology){
            $item = (new TagCloudItem())
                ->setId($items->count() + 1)
                ->setValue($technology->name)
                ->setCount($this->getTagSize());
            $items->add($item);
        }

        foreach ($this->getSectors() as $sector){
            $item = (new TagCloudItem())
                ->setId($items->count() + 1)
                ->setValue($sector->name)
                ->setCount($this->getTagSize());
            $items->add($item);
        }

        return $items;
    }

    /**
     * @return int
     * @throws \Exception
     */
    private function getTagSize() :int
    {
        return random_int(self::MIN_TAG_SIZE,self::MAX_TAG_SIZE);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getTechnologies() :\Illuminate\Database\Eloquent\Collection
    {
        return Sector::inRandomOrder()->get(['name']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getSectors() :\Illuminate\Database\Eloquent\Collection
    {
        return Skill::inRandomOrder()->get(['name']);
    }
}

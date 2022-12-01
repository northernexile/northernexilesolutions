<?php

namespace App\Services\Profile;

use App\Models\SkillType;
use Illuminate\Database\Eloquent\Collection;

class Profile implements \JsonSerializable
{
    /** @var Collection|null  */
    protected ?Collection $skillTypes = null;

    /**
     * @return Collection
     */
    public function getSkillTypes() :Collection
    {
        if(is_null($this->skillTypes)){
            $this->skillTypes = SkillType::orderBy('name')->get(['id','name']);
        }

        return $this->skillTypes;
    }

    /**
     * @return Collection[]
     */
    public function toArray() :array
    {
        return [
            'skillTypes'=>$this->getSkillTypes()
        ];
    }

    /**
     * @return Collection[]
     */
    public function jsonSerialize() :array
    {
        return $this->toArray();
    }
}

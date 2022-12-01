<?php

namespace App\Services\Profile;

use App\Models\SkillType;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * @property null|Collection $skillTypes
 * @property null|Collection $users
 */
class Profile implements \JsonSerializable
{
    /** @var Collection|null  */
    protected ?Collection $skillTypes = null;

    /** @var Collection|null  */
    protected ?Collection $users = null;

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
     * @return Collection
     */
    public function getUsers() :Collection
    {
        if(is_null($this->users)){
            $this->users = User::orderBy('name')->get(['id','name','email']);
        }
    }

    /**
     * @return Collection[]
     */
    public function toArray() :array
    {
        return [
            'users' =>  $this->getUsers(),
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

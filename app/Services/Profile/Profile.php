<?php

namespace App\Services\Profile;

use App\Models\Skill;
use App\Models\SkillType;
use App\Models\User;
use App\Models\UserSkill;
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

    /** @var Collection|null  */
    protected ?Collection $skills = null;

    /** @var Collection|null  */
    protected ?Collection $userSkills = null;

    /**
     * @var int
     */
    protected int $userId = 1;

    /**
     * @param int $userId
     * @return $this
     */
    public function setUserId(int $userId = 1) :Profile
    {
        $this->userId = $userId;
        return $this;
    }

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

        return $this->users;
    }

    /**
     * @return Collection
     */
    public function getUserSkills() :Collection
    {
        if(is_null($this->userSkills)){
            $this->userSkills = UserSkill::where('user_id','=',$this->userId)
                ->orderBy('skill_id')
                ->get(['*']);
        }

        return $this->userSkills;
    }

    /**
     * @return Collection
     */
    public function getSkillsList() :Collection
    {
        if(is_null($this->skills)) {
            $this->skills = Skill::orderBy('skill_type_id')->get(['id', 'name', 'skill_type_id']);
        }

        return $this->skills;
    }

    /**
     * @return Collection[]
     */
    public function toArray() :array
    {
        return [
            'users' =>  $this->getUsers(),
            'skillTypes'=>$this->getSkillTypes(),
            'skills'    =>  $this->getSkillsList(),
            'userSkills'    =>  $this->getUserSkills()
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

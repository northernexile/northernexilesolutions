<?php

namespace App\Models;

use App\Models\Traits\IndexedModelArrayTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $name
 * @property null|string $icon
 * @property int $skill_type_id
 * @property int $skillTypeId
 */
class Skill extends Model
{
    use HasFactory;
    use IndexedModelArrayTrait;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'icon',
        'skill_type_id'
    ];

    /**
     * @return HasMany
     */
    public function experiences() :HasMany
    {
        return $this->hasMany(ExperienceSkill::class);
    }

    /**
     * @return SkillType
     */
    public function types() :HasOne
    {
        return $this->hasOne(SkillType::class,'id','skill_type_id');
    }
}

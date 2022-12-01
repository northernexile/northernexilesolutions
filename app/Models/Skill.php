<?php

namespace App\Models;

use App\Models\Traits\IndexedModelArrayTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $skill_type_id
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
        'skill_type_id'
    ];

    /**
     * @return SkillType
     */
    public function types() :SkillType
    {
        return $this->hasOne(SkillType::class,'skill_type_id','id');
    }
}

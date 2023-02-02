<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
* @property int $id
* @property int $experience_id
* @property int $skill_id
 */
class ExperienceSkill extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    public $table = 'experience_skills';

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var string[]
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    /**
     * @var string[]
     */
    protected $fillable = [
        'experience_id',
        'skill_id'
    ];

    /**
     * @return BelongsTo
     */
    public function skill() :BelongsTo
    {
        return $this->belongsTo(Skill::class);
    }

    /**
     * @return BelongsTo
     */
    public function experience() :BelongsTo
    {
        return $this->belongsTo(Experience::class);
    }
}

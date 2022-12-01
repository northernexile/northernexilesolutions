<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $user_id
 * @property int $skill_id
 * @property Carbon $from
 * @property ?Carbon $to
 */
class UserSkill extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $dates = ['from','to'];

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'skill_id',
        'from',
        'to'
    ];
}

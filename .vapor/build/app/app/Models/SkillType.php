<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 */
class SkillType extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name'
    ];
}

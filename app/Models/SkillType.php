<?php

namespace App\Models;

use App\Models\Traits\IndexedModelArrayTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

/**
 * @property int $id
 * @property  string $name
 */
class SkillType extends Model
{
    use HasFactory;
    use IndexedModelArrayTrait;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name'
    ];
}

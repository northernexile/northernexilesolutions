<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
* @property int $id
* @property int $name
 */
class Tag extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    public $table = 'tags';

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
        'name'
    ];

    /**
     * @return HasMany
     */
    public function experiences() :HasMany
    {
        return $this->hasMany(ExperienceTag::class);
    }
}

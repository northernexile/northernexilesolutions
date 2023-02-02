<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
* @property int $id
* @property int $experience_id
* @property string $description
 */
class Project extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    public $table = 'projects';

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
        'description'
    ];

    /**
     * @return BelongsTo
     */
    public function experience() :BelongsTo
    {
        return $this->belongsTo(Experience::class);
    }
}

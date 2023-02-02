<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
* @property int $id
* @property int $experience_id
* @property int $tag_id
 */
class ExperienceTag extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    public $table = 'experience_tags';

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
        'tag_id'
    ];

    /**
     * @return BelongsTo
     */
    public function tag() :BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }

    /**
     * @return BelongsTo
     */
    public function experience() :BelongsTo
    {
        $this->belongsTo(Experience::class);
    }
}

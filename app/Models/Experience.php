<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $company
 * @property string $title
 * @property string $description
 * @property Carbon $start
 * @property Carbon|null $stop
 */
class Experience extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    public $table = 'experiences';

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var string[]
     */
    protected $dates = [
        'start',
        'stop',
        'created_at',
        'updated_at'
    ];
    /**
     * @var string[]
     */
    protected $fillable = [
        'company',
        'title',
        'description',
        'start',
        'stop'
    ];

    /**
     * @return HasMany
     */
    public function projects() :HasMany
    {
        return $this->hasMany(Project::class);
    }
}

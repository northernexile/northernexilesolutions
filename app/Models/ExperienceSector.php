<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
* @property int $id
 */
class ExperienceSector extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    public $table = 'experience_sectors';

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
        'sector_id'
    ];
}

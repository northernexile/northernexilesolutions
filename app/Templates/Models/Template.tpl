<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
[Properties]
 */
class [ModuleSingular] extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    public $table = '[ModuleSingularLowercase]';

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
        [Fillable]
    ];
}

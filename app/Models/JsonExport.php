<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $table
 * @property Carbon $exported_at
 * @property int $records_exported
 */
class JsonExport extends Model
{
    use HasFactory;

    /** @var bool  */
    public $timestamps = false;
    /** @var string[]  */
    protected $dates = [
        'exported_at'
    ];
    /** @var string[]  */
    protected $fillable = [
        'table',
        'exported_at',
        'records_exported'
    ];
}

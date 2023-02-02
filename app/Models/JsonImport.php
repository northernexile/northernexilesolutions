<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $table
 * @property Carbon $import_date
 * @property  int $records_created
 */
class JsonImport extends Model
{
    use HasFactory;

    public $timestamps = false;

    /** @var string[]  */
    protected $dates = [
        'import_date'
    ];
    /** @var string[]  */
    protected $fillable = [
        'table',
        'import_date',
        'records_created'
    ];
}

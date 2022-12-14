<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $state_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $state_text
 * @property string $state_color
 */
class Availability extends Model
{
    use HasFactory;

    /** @var int  */
    public const STATE_ENGAGED = 0;
    /** @var int  */
    public const STATE_OPEN_TO_ENQUIRIES = 1;
    /** @var int  */
    public const STATE_FREE = 2;
    /** @var \string[][]  */
    public const STATES = [
        self::STATE_ENGAGED => ['text'=>'Engaged on contract(s)','color'=>'red'],
        self::STATE_OPEN_TO_ENQUIRIES => ['text'=>'Open to enquiries','color'=>'amber'],
        self::STATE_FREE => ['text'=>'Free for new business','color'=>'green'],
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'state_id',
        'created_at'
    ];
    /** @var bool  */
    public $timestamps = true;

    /**
     * @var string[]
     */
    protected $appends = [
        'state_color',
        'state_text'
    ];

    /**
     * @var string[]
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @return string
     */
    public function getStateTextAttribute() :string
    {
        return self::STATES[$this->state_id]['state_text'];
    }

    /**
     * @return string
     */
    public function getStateColorAttribute() :string
    {
        return self::STATES[$this->state_id]['state_color'];
    }
}

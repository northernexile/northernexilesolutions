<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $client_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class ClientInvoice extends Model
{
    use HasFactory;

    const STATUS_CREATED = 0;
    const STATUS_SUBMITTED = 1;

    const STATUS_PAID = 2;
    const STATUS_CANCELLED = -1;

    const STATUS_REJECTED = -2;


    /** @var string  */
    protected $table = 'client_invoices';
    /** @var string[]  */
    protected $fillable = [
        'client_id',
        'status'
    ];
    /** @var bool  */
    public $timestamps = true;

    /**
     * @var string[]
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @return BelongsTo
     */
    public function client() :BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * @return HasMany
     */
    public function items() :HasMany
    {
        return $this->hasMany(ClientInvoiceItem::class);
    }
}

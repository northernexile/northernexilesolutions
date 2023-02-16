<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $client_invoice_id
 * @property int $amount_in_pence_ex_vat
 * @property string $description
 * @property Carbon $item_date
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class ClientInvoiceItem extends Model
{
    use HasFactory;

    /** @var string  */
    protected $table = 'client_invoice_items';

    /** @var bool  */
    public $timestamps = true;

    /** @var string[]  */
    protected $dates = [
        'item_date',
        'created_at',
        'updated_at'
    ];

    /** @var string[]  */
    protected $fillable = [
        'client_invoice_id',
        'amount_in_pence_ex_vat',
        'description',
        'item_date'
    ];

    /**
     * @return BelongsTo
     */
    public function invoice() :BelongsTo
    {
        return $this->belongsTo(ClientInvoice::class);
    }
}

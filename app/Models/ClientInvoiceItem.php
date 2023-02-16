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
    const CURRENCY_SYMBOL = '£';

    const CURRENCY = 'GBP';

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

    protected $appends = [
        'ex_vat',
        'currency_symbol',
        'currency'
    ];

    /**
     * @return BelongsTo
     */
    public function invoice() :BelongsTo
    {
        return $this->belongsTo(ClientInvoice::class);
    }

    public function getExVatAttribute() :string
    {
        return number_format($this->amount_in_pence_ex_vat / 100,2);
    }

    public function getCurrencySymbolAttribute() :string
    {
        return self::CURRENCY_SYMBOL;
    }

    public function getCurrencyAttribute() :string
    {
        return self::CURRENCY;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientAddress extends Model
{
    use HasFactory;

    protected $table = 'client_addresses';

    /**
     * @var string[]
     */
    protected $fillable = [
        'address_id',
        'client_id'
    ];

    /**
     * @return BelongsTo
     */
    public function client() :BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * @return BelongsTo
     */
    public function address() :BelongsTo
    {
        return $this->belongsTo(Address::class);
    }
}

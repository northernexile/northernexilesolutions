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

    public function summarise() :string
    {
        $parts = [];
        foreach ([
            'thoroughfare',
                     'address_line_1',
                     'address_line_2',
                     'address_line_3',
                     'town',
                     'county',
                     'postcode',
                 ] as $address){
            if($this->$address){
                $parts[] = $this->$address;
            }
        }

        return implode(', ',$parts);
    }
}

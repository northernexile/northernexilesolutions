<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $thoroughfare
 * @property string $address_line_1
 * @property string $address_line_2
 * @property string $address_line_3
 * @property string $town
 * @property string $county
 * @property string $postcode
 */
class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = [
        'thoroughfare',
        'address_line_1',
        'address_line_2',
        'address_line_3',
        'town',
        'county',
        'postcode',
    ];

    public function clientAddress() :HasMany
    {
        return $this->hasMany(ClientAddress::class);
    }
}

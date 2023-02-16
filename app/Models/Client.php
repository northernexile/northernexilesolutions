<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
* @property int $id
* @property string $name
* @property string $email
* @property string $phone
 */
class Client extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    public $table = 'clients';

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
        'name',
        'email',
        'telephone'
    ];

    /**
     * @return HasMany
     */
    public function clientAddresses() :HasMany
    {
        return $this->hasMany(ClientAddress::class);
    }

    /**
     * @return HasMany
     */
    public function invoices() :HasMany
    {
        return $this->hasMany(ClientInvoice::class);
    }
}

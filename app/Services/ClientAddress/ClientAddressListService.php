<?php

namespace App\Services\ClientAddress;

use App\Models\ClientAddress;
use Illuminate\Database\Eloquent\Collection;

class ClientAddressListService
{
    const DEFAULTS = [
        'client_addresses.id',
        'client_id',
        'addresses.id',
        'thoroughfare',
        'address_line_1',
        'address_line_2',
        'address_line_3',
        'town',
        'county',
        'postcode',
    ];
    /**
     * @param array $columns
     * @return Collection
     */
    public function getList(array $columns=self::DEFAULTS) :Collection
    {
        $items = ClientAddress::join('addresses','client_addresses.address_id','=','addresses.id')
            ->get($columns);

        foreach ($items as $item){
            $item->address = $item->summarise();
        }

        return $items;
    }
}

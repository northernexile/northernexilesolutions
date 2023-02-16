<?php

namespace App\Http\Requests\ClientInvoice;

use App\Http\Requests\AbstractFormRequest;

class ClientInvoiceListRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'client_id'=>'integer|required'
        ];
    }
}

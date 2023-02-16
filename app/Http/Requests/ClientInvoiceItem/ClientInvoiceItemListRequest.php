<?php

namespace App\Http\Requests\ClientInvoiceItem;

use App\Http\Requests\AbstractFormRequest;

class ClientInvoiceItemListRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'client_invoice_id'=>'integer|required'
        ];
    }
}

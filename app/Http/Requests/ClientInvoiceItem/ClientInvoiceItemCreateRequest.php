<?php

namespace App\Http\Requests\ClientInvoiceItem;

use App\Http\Requests\AbstractFormRequest;

class ClientInvoiceItemCreateRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'client_invoice_id' => 'required|integer',
            'amount_in_pence_ex_vat'=>'integer|required',
            'description'=>'required|string',
            'item_date'=>'required|date'
        ];
    }
}

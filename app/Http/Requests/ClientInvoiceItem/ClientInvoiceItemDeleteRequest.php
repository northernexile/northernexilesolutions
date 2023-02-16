<?php

namespace App\Http\Requests\ClientInvoiceItem;

use App\Http\Requests\AbstractFormRequest;

class ClientInvoiceItemDeleteRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id'=>'integer|required'
        ];
    }
}

<?php

namespace App\Http\Requests\ClientInvoice;

use App\Http\Requests\AbstractFormRequest;

class ClientInvoiceDeleteRequest extends AbstractFormRequest
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

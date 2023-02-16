<?php

namespace App\Http\Requests\ClientInvoice;

use App\Http\Requests\AbstractFormRequest;

class ClientInvoiceCreateRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
          'client_id' => 'required|integer'
        ];
    }
}

<?php

namespace App\Http\Requests\ClientInvoice;

use App\Http\Requests\AbstractFormRequest;

class ClientInvoiceDeleteAllRequest extends AbstractFormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return parent::rules();
    }
}

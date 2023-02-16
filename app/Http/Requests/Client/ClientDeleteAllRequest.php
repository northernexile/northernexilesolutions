<?php

namespace App\Http\Requests\Client;

use App\Http\Requests\AbstractFormRequest;

class ClientDeleteAllRequest extends AbstractFormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return parent::rules();
    }
}

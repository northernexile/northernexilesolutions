<?php

namespace App\Http\Requests\Service;

use App\Http\Requests\AbstractFormRequest;

class ServiceDeleteRequest extends AbstractFormRequest
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

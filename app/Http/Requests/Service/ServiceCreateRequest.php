<?php

namespace App\Http\Requests\Service;

use App\Http\Requests\AbstractFormRequest;

class ServiceCreateRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
          'id'=>'integer|sometimes',
          'name'=>'string|required',
          'text'=>'string|required'
        ];
    }
}

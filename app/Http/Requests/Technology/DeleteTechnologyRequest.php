<?php

namespace App\Http\Requests\Technology;

use App\Http\Requests\AbstractFormRequest;

class DeleteTechnologyRequest extends AbstractFormRequest
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

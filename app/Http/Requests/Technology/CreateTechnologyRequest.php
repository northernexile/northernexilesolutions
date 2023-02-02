<?php

namespace App\Http\Requests\Technology;

use App\Http\Requests\AbstractFormRequest;

class CreateTechnologyRequest extends AbstractFormRequest
{
    public function rules(): array
    {
        return [
            'name'=>'required|string',
            'skill_type_id'=>'required|integer',
            'icon'=>'sometimes|string',
            'description'=>'sometimes|string'
        ];
    }
}

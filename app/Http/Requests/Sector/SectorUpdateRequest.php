<?php

namespace App\Http\Requests\Sector;

use App\Http\Requests\AbstractFormRequest;

class SectorUpdateRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id'=>'integer|required',
            'name'=>'string|required',
            'text'=>'string|required'
        ];
    }
}

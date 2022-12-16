<?php

namespace App\Http\Requests\Sector;

use App\Http\Requests\AbstractFormRequest;

class SectorDeleteRequest extends AbstractFormRequest
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

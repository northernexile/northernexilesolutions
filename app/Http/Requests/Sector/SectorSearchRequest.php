<?php

namespace App\Http\Requests\Sector;

use App\Http\Requests\AbstractFormRequest;

class SectorSearchRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'term'=>'required'
        ];
    }
}

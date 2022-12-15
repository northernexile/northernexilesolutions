<?php

namespace App\Http\Requests\Sector;

class SectorUpdateRequest
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

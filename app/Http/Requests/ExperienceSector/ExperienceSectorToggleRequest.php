<?php

namespace App\Http\Requests\ExperienceSector;

use App\Http\Requests\AbstractFormRequest;

class ExperienceSectorToggleRequest extends AbstractFormRequest
{
    public function rules(): array
    {
        return [
            'experience_id'=>'required|integer',
            'sector_id'=>'required|integer',
        ];
    }
}

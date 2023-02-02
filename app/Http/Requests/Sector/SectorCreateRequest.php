<?php

namespace App\Http\Requests\Sector;

use App\Http\Requests\AbstractFormRequest;

class SectorCreateRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
          'name'=>'string|required',
          'text'=>'string|sometimes'
        ];
    }
}

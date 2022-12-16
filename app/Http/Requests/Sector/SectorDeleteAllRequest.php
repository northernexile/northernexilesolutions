<?php

namespace App\Http\Requests\Sector;

use App\Http\Requests\AbstractFormRequest;

class SectorDeleteAllRequest extends AbstractFormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return parent::rules();
    }
}

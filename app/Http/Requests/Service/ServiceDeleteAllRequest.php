<?php

namespace App\Http\Requests\Service;

use App\Http\Requests\AbstractFormRequest;

class ServiceDeleteAllRequest extends AbstractFormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return parent::rules();
    }
}

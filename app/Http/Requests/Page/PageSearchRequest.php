<?php

namespace App\Http\Requests\Page;

use App\Http\Requests\AbstractFormRequest;

class PageSearchRequest extends AbstractFormRequest
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

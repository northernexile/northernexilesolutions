<?php

namespace App\Http\Requests\Page;

use App\Http\Requests\AbstractFormRequest;

class PageViewRequest extends AbstractFormRequest
{
    public function rules(): array
    {
        return [
            'id'=>'required'
        ];
    }
}

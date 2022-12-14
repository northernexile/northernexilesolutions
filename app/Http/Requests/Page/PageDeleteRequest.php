<?php

namespace App\Http\Requests\Page;

use App\Http\Requests\AbstractFormRequest;

class PageDeleteRequest extends AbstractFormRequest
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

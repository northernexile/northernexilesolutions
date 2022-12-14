<?php

namespace App\Http\Requests\Page;

use App\Http\Requests\AbstractFormRequest;

class PageSaveRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
          'id'=>'integer|sometimes',
          'name'=>'string|required',
          'slug'=>'string|required'
        ];
    }
}

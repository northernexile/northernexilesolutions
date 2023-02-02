<?php

namespace App\Http\Requests\Tag;

use App\Http\Requests\AbstractFormRequest;

class TagCreateRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
          'name' => 'required|string'
        ];
    }
}

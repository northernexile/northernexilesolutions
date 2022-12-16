<?php

namespace App\Http\Requests\Tag;

use App\Http\Requests\AbstractFormRequest;

class TagDeleteAllRequest extends AbstractFormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return parent::rules();
    }
}

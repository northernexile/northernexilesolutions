<?php

namespace App\Http\Requests\Content;

use App\Http\Requests\AbstractFormRequest;

class ContentDeleteAllRequest extends AbstractFormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return parent::rules();
    }
}

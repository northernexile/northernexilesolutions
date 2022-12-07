<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class AbstractFormRequest extends FormRequest implements ApiFormRequestInterface
{
    /**
     * @return bool
     */
    public function authorize():bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules() :array
    {
        return [

        ];
    }
}

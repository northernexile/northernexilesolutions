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

    public function all($keys = null)
    {
        $request = request()->all();
        $request['id'] = $this->route('id');
        return $request;

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

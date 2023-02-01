<?php

namespace App\Http\Requests\Experience;

use App\Http\Requests\AbstractFormRequest;

class ExperienceDeleteAllRequest extends AbstractFormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return parent::rules();
    }
}

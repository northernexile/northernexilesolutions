<?php

namespace App\Http\Requests\Project;

use App\Http\Requests\AbstractFormRequest;

class ProjectListRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'experience_id'=>'required|integer'
        ];
    }
}

<?php

namespace App\Http\Requests;

interface ApiFormRequestInterface
{
    /**
     * @return bool
     */
    public function authorize():bool;
}

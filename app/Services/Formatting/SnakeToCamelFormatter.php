<?php

namespace App\Services\Formatting;

use Illuminate\Support\Str;

class SnakeToCamelFormatter
{
    /**
     * @param array $data
     * @return array
     */
    public static function convert(array $data = []) :array
    {
        $converted = [];

        foreach ($data as $key=>$value){
            $converted[Str::camel($key)] = $value;
            if(is_array($value)){
                $subSet = self::convert($value);
                $converted[Str::camel($key)] = $subSet;
            }
        }

        return $converted;
    }
}

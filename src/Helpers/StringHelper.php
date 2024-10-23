<?php

namespace OrchidQuick\Helpers;

class StringHelper
{
    public static function splitCamelCase($string): string
    {
        $converted = preg_replace('/(?<!^)([A-Z])/', ' $1', $string);
        return ucwords($converted);
    }
}

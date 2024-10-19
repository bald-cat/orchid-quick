<?php

namespace OrchidQuick\Fields;

use Illuminate\Support\Str;

class Field
{

    protected static function getTitle(string $string)
    {
        return Str::title(str_replace('_', ' ', last(explode('.', $string))));
    }

    protected static function getPlaceholder(string $name): string
    {
        return 'Enter ' . self::getTitle($name);
    }

}

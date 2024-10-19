<?php

namespace App\Orchid\Fields;

use Illuminate\Support\Str;
use Orchid\Screen\Fields\Input;

class Number extends Field
{
    public static function make(
        string $name,
        int $default = null,
        int|float $step = null,
        int|float $min = null,
        int|float $max = null,
    )
    {
        $number = Input::make($name)
            ->title(self::getTitle($name))
            ->placeholder(self::getPlaceholder($name))
            ->type('number');

        if ($default !== null) {
            $number->value($default);
        }

        if ($step) {
            $number->step($step);
        }

        if ($min) {
            $number->min($min);
        }

        if ($max) {
            $number->max($max);
        }

        return $number;

    }
}

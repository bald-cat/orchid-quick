<?php

namespace OrchidQuick\Fields;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;

class LongText extends Field
{
    public static function make(string $name, bool $required = false)
    {
        return TextArea::make($name)
            ->required($required)
            ->title(self::getTitle($name))
            ->rows(5)
            ->placeholder(self::getPlaceholder($name));
    }
}

<?php

namespace App\Orchid\Fields;

use Illuminate\Support\Str;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Facades\Layout;

class ShortText extends Field
{
    public static function make(string $name, bool $required = false)
    {
        return Input::make($name)
            ->required($required)
            ->title(self::getTitle($name))
            ->placeholder(self::getPlaceholder($name));
    }

}

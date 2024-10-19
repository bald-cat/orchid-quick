<?php

namespace App\Orchid\Fields;

use Illuminate\Support\Str;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Support\Facades\Layout;

class HtmlText extends Field
{
    public static function make(string $name, bool $required = false)
    {
        return SimpleMDE::make($name)
            ->required($required)
            ->title(self::getTitle($name))
            ->placeholder(self::getPlaceholder($name));
    }

}

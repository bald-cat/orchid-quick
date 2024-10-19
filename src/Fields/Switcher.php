<?php

namespace OrchidQuick\Fields;

class Switcher extends Field
{
    public static function make(string $name)
    {
        return \Orchid\Screen\Fields\Switcher::make($name)
                ->sendTrueOrFalse()
                ->value(true)
                ->title(self::getTitle($name))
                ->placeholder(self::getPlaceholder($name));
    }

    protected static function getPlaceholder(string $name): string
    {
        return 'Enter ' . self::getTitle($name) . ' status';
    }

}

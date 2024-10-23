<?php

namespace OrchidQuick\Fields;

use Orchid\Screen\Actions\Button;
use Orchid\Support\Color;

class Save
{
    public static function make(string $attribute)
    {
        return Button::make()
            ->name(__('Save'))
            ->type(Color::DARK)
            ->route("$attribute.store");
    }
}

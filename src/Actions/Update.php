<?php

namespace OrchidQuick\Actions;

use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Support\Color;

class Update
{
    public static function make(string $attribute, int $id)
    {
        return Button::make()
            ->name(__('Update'))
            ->type(Color::DARK)
            ->route($attribute . '.update', $id);
    }
}

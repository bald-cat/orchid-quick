<?php

namespace OrchidQuick\Actions;

use Orchid\Screen\Actions\Link;
use Orchid\Support\Color;

class Create extends Action
{

    /**
     * @param string $attribute
     * @return Link
     */
    public static function make(string $attribute): Link
    {
        return Link::make()
            ->name(__('Create'))
            ->type(Color::INFO)
            ->route('platform.' . $attribute . '.form');
    }
}

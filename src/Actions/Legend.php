<?php

namespace OrchidQuick\Actions;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\Actions\Link;
use Orchid\Support\Color;

class Legend extends Action
{

    const ROUTE_PREFIX  = '.show';

    public static function make(Model $model)
    {
        return Link::make()
            ->name(__('Edit'))
            ->type(Color::WARNING)
            ->rawClick(true)
            ->route('platform.' . self::modelAttribute($model) . self::ROUTE_PREFIX, $model->id);
    }
}

<?php

namespace OrchidQuick\Fields;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\Actions\Link;
use Orchid\Support\Color;

class Edit extends Action
{

    const ROUTE_PREFIX  = '.form.edit';

    public static function make(Model $model)
    {
        return Link::make()
            ->name(__('Edit'))
            ->type(Color::WARNING)
            ->rawClick(true)
            ->route('platform.' . self::modelAttribute($model) . self::ROUTE_PREFIX, $model->id);
    }
}

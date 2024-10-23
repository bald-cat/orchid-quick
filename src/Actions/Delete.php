<?php

namespace App\Orchid\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Color;

class Delete extends Action
{

    const ROUTE_PREFIX = '.destroy';

    public static function make(Model $model)
    {
        return Button::make()
            ->type(Color::DANGER)
            ->name(__('Delete'))
            ->confirm(__('Are you sure you want to delete this ' . self::modelName($model) . '?'))
            ->route(self::modelAttribute($model) . self::ROUTE_PREFIX, $model->id);
    }

}

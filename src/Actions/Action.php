<?php

namespace App\Orchid\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Action
{

    protected static function modelName(Model $model): string
    {
        return class_basename($model);
    }

    protected static function modelAttribute(Model $model): string
    {
        return Str::camel(self::modelName($model));
    }

}

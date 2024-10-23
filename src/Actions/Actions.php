<?php

namespace App\Orchid\Actions;

use Illuminate\Support\Arr;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\TD;

class Actions
{
    /**
     * Return Actions button group for table
     * @param array $actions
     * @return TD
     */
    public static function make(array $actions = []): TD
    {
        return TD::make('Actions')->render(function ($row) use ($actions) {

            $group = [];
            foreach ($actions as $action) {
                $group[] = $action::make($row);
            }

            return Group::make($group)->toEnd();
        })->width(count($actions) * 75);
    }
}

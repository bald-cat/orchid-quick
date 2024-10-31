<?php

namespace OrchidQuick\Actions;

use Illuminate\Support\Arr;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\TD;

class Actions
{
    /**
     * Return Actions button group for table
     * @param array $actions
     * @param array|null $customActions
     * @return TD
     */
    public static function make(array $actions = [], ?array $customActions = null): TD
    {
        $count = count($actions);
        if ($customActions) {
            $count += count($customActions);
        }

        $width = $count * 100;

        return TD::make('Actions')->render(function ($row) use ($actions, $customActions) {

            $group = [];

            if ($customActions) {
                foreach ($customActions as $action) {
                    $group[] = $action;
                }
            }

            foreach ($actions as $action) {
                $group[] = $action::make($row);
            }

            return Group::make($group)->toEnd();
        })->width($width);
    }
}

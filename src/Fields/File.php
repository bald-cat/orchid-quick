<?php

namespace App\Orchid\Fields;

use Orchid\Screen\Fields\Attach;

class File extends Field
{

    public static function make(string $name, bool $required = false, string $storage = 'images')
    {
        return Attach::make($name)
            ->title(self::getTitle($name))
            ->required($required)
            ->storage($storage);
    }

}

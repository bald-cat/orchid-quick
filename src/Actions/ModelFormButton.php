<?php

namespace OrchidQuick\Actions;

class ModelFormButton
{
    public static function make(string $attribute, ?int $id)
    {
        return $id
            ? Update::make($attribute, $id)
            : Save::make($attribute);
    }
}

<?php

namespace OrchidQuick\Fields;

use Illuminate\Database\Eloquent\Model;

class Select extends \Orchid\Screen\Fields\Select
{

    /**
     * @param string|Model $model
     */
    public function fromTrModel($model, string $name, ?string $key = null): self
    {
        $model = is_object($model) ? $model : new $model;
        $key = $key ?? $model->getModel()->getKeyName();

        $this->set('options', $model->with('translations')->get()->pluck($name, $key));

        return $this->addBeforeRender(function () use ($name) {
            $value = [];

            collect($this->get('value'))->each(static function ($item) use (&$value, $name) {
                if (is_object($item)) {
                    $value[$item->id] = $item->$name;
                } else {
                    $value[] = $item;
                }
            });

            $this->set('value', $value);
        });
    }

}

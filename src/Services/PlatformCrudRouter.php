<?php

namespace OrchidQuick\Services;

use OrchidQuick\Helpers\StringHelper;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Tabuna\Breadcrumbs\Trail;

class PlatformCrudRouter
{
    public static function routes(array $pages): array
    {
        return Arr::map($pages, function ($page) {
            $label = Str::studly($page);

            if (class_exists("App\\Orchid\\Screens\\$label\\{$label}Screen")) {
                Route::screen("/$page", "App\\Orchid\\Screens\\$label\\{$label}Screen")
                    ->name("platform.$page")
                    ->breadcrumbs(fn (Trail $trail) => $trail
                        ->parent('platform.index')
                        ->push(__(StringHelper::splitCamelCase($page)), route("platform.$page")));
            }

            if (class_exists("App\\Orchid\\Screens\\$label\\{$label}FormScreen")) {
                Route::screen("/$page/create", "App\\Orchid\\Screens\\$label\\{$label}FormScreen")
                    ->name("platform.$page.form")
                    ->breadcrumbs(fn (Trail $trail) => $trail
                        ->parent("platform.$page")
                        ->push(__('Create'), route("platform.$page.form")));

                Route::screen("/$page/{" . $page . "}/edit", "App\\Orchid\\Screens\\$label\\{$label}FormScreen")
                    ->name("platform.$page.form.edit")
                    ->breadcrumbs(fn (Trail $trail) => $trail
                        ->parent("platform.$page")
                        ->push(request($page)));
            }

            if (class_exists("App\\Http\\Controllers\\CRUD\\$label\\{$label}StoreController")) {
                Route::post("/$page/store", "App\\Http\\Controllers\\CRUD\\$label\\{$label}StoreController")->name("$page.store");
            }

            if (class_exists("App\\Http\\Controllers\\CRUD\\$label\\{$label}UpdateController")) {
                Route::post("/$page/{" . $page . "}/update", "App\\Http\\Controllers\\CRUD\\$label\\{$label}UpdateController")->name("$page.update");
            }

            if (class_exists("App\\Http\\Controllers\\CRUD\\$label\\{$label}DestroyController")) {
                Route::post("/$page/{" . $page . "}/destroy", "App\\Http\\Controllers\\CRUD\\$label\\{$label}DestroyController")->name($page . ".destroy");
            }
        });
    }

}

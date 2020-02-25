<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadViewsFrom(resource_path('/views/app'), 'app');
        $this->loadViewsFrom(resource_path('/views/app/admin'), 'admin');

        \Carbon\Carbon::setLocale('es');
        \Faker\Factory::create('es_ES');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('component.alert', 'alert');
        Blade::component('component.error', 'ferror');
        Blade::component('component.delete', 'delete');
    }
}

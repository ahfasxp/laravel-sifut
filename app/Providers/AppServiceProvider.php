<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(\Auth::user()){
            $setting = App\Setting::findOrFail(1);
            $title = $setting->name;
            $image = $setting->image;
            $tema = $setting->tema;
            View::share('title', $title);
            View::share('image', $image);
            View::share('tema', $tema);
        }
    }
}

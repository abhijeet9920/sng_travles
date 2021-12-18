<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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

        // Using Closure based composers...
        View::composer('front.layouts.layout', function ($view) {
            $view->with(['you_tube_link' => 'https://www.youtube.com/embed/jEd_7h8_5hA','key' => env('CRYPRO_JS_KEY')]);
        });
    }
}
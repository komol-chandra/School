<?php

namespace App\Providers;

use App\Models\SystemSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();
        View::composer(["Backend.layouts.header"], function ($view) {

            $view->with("settings", Cache::rememberForever("settings", function () {
                return SystemSetting::first();
            }));
        });
        View::composer(["Backend.layouts.footer"], function ($view) {

            $view->with("settings", Cache::rememberForever("settings", function () {
                return SystemSetting::first();
            }));
        });
        View::composer(["Backend.layouts.app"], function ($view) {

            $view->with("settings", Cache::rememberForever("settings", function () {
                return SystemSetting::first();
            }));
        });

    }
}

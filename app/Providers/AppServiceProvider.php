<?php

namespace App\Providers;

use App\Models\Settings;
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
        if (php_sapi_name() !== "cli") {
            $settings = [];
            $settingsCollection = Settings::all();
            foreach ($settingsCollection as $setting) {
                $settings[$setting->name] = (float) number_format((float) $setting->value, 2);
            }

            View::share('settings', $settings);
        }        
    }
}

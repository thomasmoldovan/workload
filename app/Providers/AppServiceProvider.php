<?php

namespace App\Providers;

use App\Models\Settings;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public $settings;
    public $settingsCollection;

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
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        if (php_sapi_name() !== "cli") {
            $this->settings = [];
            $this->settingsCollection = Settings::all();
            foreach ($this->settingsCollection as $setting) {
                $this->settings[$setting->name] = (float) number_format((float) $setting->value, 2);
            }

            View::share('settings', $this->settings);
        }        
    }
}

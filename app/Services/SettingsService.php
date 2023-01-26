<?php

namespace App\Services;

use App\Models\Colaborator;
use App\Models\Delivery;
use App\Models\Goal;
use App\Models\Settings;
use App\Models\Student;
use App\Models\Workload;

class SettingsService
{
    public $settingsCollection;

    public function __construct()
    {
        $this->settingsCollection = Settings::all()   ;
    }

    public function getSettings() 
    {
        $settings = [];
        foreach ($this->settingsCollection as $setting) {
            $settings[$setting->name] = (float) number_format((float) $setting->value, 2);
        }
        return $settings;
    }
    
}
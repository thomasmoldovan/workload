<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index() 
    {
        return view('admin.settings.index');
    }

    public function update(Request $request) 
    {
        if (empty($request)) {
            return;
        }

        $input = $request->all();

        foreach ($input as $key => $value) {
            if ($key == "_token") continue;

            $setting = Settings::where("name", $key)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            } else {
                $setting = new Settings();
                $setting->name = $key;
                $setting->value = $value;
                $setting->save();
            }
        }

        return redirect("/settings");
    }
}

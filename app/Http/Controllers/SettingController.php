<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $setting = Setting::first();
        return view('setting.show', compact('setting'));
    }

    public function edit()
    {
        $setting = Setting::first();

        return view('setting.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();
        $setting->popular_id = $request->popular_id;
        $setting->post1_id = $request->post1_id;
        $setting->post2_id = $request->post2_id;
        $setting->post3_id = $request->post3_id;
        $setting->post4_id = $request->post4_id;
        $setting->post5_id = $request->post5_id;
        $setting->post6_id = $request->post6_id;
        $setting->whatsapp = $request->whatsapp;
        $setting->save();
        
        return redirect()->route('setting.show');
    }

}

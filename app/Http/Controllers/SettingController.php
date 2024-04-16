<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SettingController extends Controller
{
    //
    public function index()
    {
        $setting = Setting::first();
        return Inertia::render('Setting', compact('setting'));
    }
    public function update(Request $request,$id)
    {
        $setting = Setting::findOrFail($id);
        if($setting){
            $setting->update($request->all());
        }else{
            $setting = Setting::created($request->all());
        }
        return back()->with('success', 'Create successfully');
    }
}

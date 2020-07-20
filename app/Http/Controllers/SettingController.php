<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::findOrFail(1);
        return view('settings.index', compact('settings'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'photo.mimes' => 'Photo hanya gambar jpeg, jpg atau png'
        ];

        $request->validate([
            'name' => 'required|string|max:60',
            'photo' => 'nullable|mimes:jpg,png,jpeg'
        ], $messages);

        $setting = Setting::findOrFail($id);
        $photo = $setting->image;
        if($request->file('photo')){                
            if($setting->image && file_exists(storage_path('app/public/' . $setting->image))){         
                \Storage::delete('public/' . $setting->image);         
            }
            $photo = $request->file('photo')->store('settings', 'public');
        }

        $setting->name = $request->get('name');
        $setting->description = $request->get('description');
        $setting->tema = $request->get('tema');
        $setting->image = $photo;
        $setting->save();

        return redirect()->route('settings.index')->withSuccess('Pengaturan Berhasil diedit!');
    }
}

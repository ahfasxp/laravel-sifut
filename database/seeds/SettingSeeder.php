<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new \App\Setting;
        $setting->name = 'SI - Futsal';
        $setting->description = 'Sistem Informasi Futsal';
        $setting->tema = 'light';
        $setting->save();
    }
}

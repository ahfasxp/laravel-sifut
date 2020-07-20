<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\User;
        $admin->name = "Administrator";
        $admin->email = "admin@mail.com";
        $admin->password = \Hash::make("admin123");
        $admin->role = "admin";
        $admin->save();
    }
}

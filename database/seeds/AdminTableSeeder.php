<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=new \App\Admin();
        $admin->name ="Admin";
        $admin->email ="test@test.com";
        $admin->password = "secret";
        $admin->save();
    }
}

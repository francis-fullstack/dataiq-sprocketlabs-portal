<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //Default Sprocket Labs Admin User for Initial Login
	    $users = array(
            [
            'last_name' => 'Portal', 
            'first_name' => 'DataIQ', 
            'middle_name' => 'Sprocket Labs', 
            'email' => 'francisfernandez163@gmail.com', 
            'phone' => '000', 
            'user_type' => 'admin', 
            'is_active' => 'Y', 
            'password' => Hash::make('dataiq2021'),
            'last_edit_user_id' => '1'
            ],
        );
            
        foreach ($users as $user)
        {
            User::create($user);
        }  

    }
}

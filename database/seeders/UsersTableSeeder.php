<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([

                'id' => '1',
                'name' => 'Admin',
                'surname' => 'Admin',
                'email' => 'admin@admin.com',
                'admin' => '1',
                'department_id' => '1',
                'address' => '11 Category Manager',
                'avatar' => 'default.jpg',
                'password' => Hash::make('password'),
                'remember_token' => '',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),

        ]);
    }
}




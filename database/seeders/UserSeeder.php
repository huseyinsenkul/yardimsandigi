<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::create([
            'name' => 'Demo Admin',
            'email' => 'admin@demo.com',
            'password' => Hash::make('demo'),
        ]);

        User::create([
            'name' => 'Demo User',
            'email' => 'user@demo.com',
            'password' => Hash::make('demo'),
        ]);
    }
}

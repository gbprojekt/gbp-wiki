<?php

namespace Database\Seeders;

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
        User::create([
            'name' => 'admin',
            'email' => 'admin@test.test',
            'password' => Hash::make('admin-1234')
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@test.test',
            'password' => Hash::make('user-1234')
        ]);

        User::create([
            'name' => 'money',
            'email' => 'money@test.test',
            'password' => Hash::make('money-1234')
        ]);

        User::create([
            'name' => 'it',
            'email' => 'it@test.test',
            'password' => Hash::make('it-1234')
        ]);

        User::create([
            'name' => 'business',
            'email' => 'business@test.test',
            'password' => Hash::make('business-1234')
        ]);
    }
}

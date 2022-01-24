<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Junges\ACL\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create([
            'name' => 'admin',
            'slug' => 'admin',
            'description' => 'admin'
        ]);

        Group::create([
            'name' => 'money',
            'slug' => 'money',
            'description' => 'money'
        ]);

        Group::create([
            'name' => 'it',
            'slug' => 'it',
            'description' => 'it'
        ]);

        Group::create([
            'name' => 'business',
            'slug' => 'business',
            'description' => 'business'
        ]);
    }
}

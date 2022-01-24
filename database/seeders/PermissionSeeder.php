<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Junges\ACL\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'admin',
            'slug' => 'admin',
            'description' => 'admin'
        ]);

        Permission::create([
            'name' => 'money',
            'slug' => 'money',
            'description' => 'money'
        ]);

        Permission::create([
            'name' => 'it',
            'slug' => 'it',
            'description' => 'it'
        ]);

        Permission::create([
            'name' => 'business',
            'slug' => 'business',
            'description' => 'business'
        ]);
    }
}

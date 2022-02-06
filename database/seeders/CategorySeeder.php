<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'objectOrder' => 1,
            'name' => 'Finanzen',
            'active' => 0
        ]);

        Category::create([
            'objectOrder' => 2,
            'name' => 'IT',
            'active' => 0
        ]);

        Category::create([
            'objectOrder' => 3,
            'name' => 'Business',
            'active' => 0
        ]);
    }
}

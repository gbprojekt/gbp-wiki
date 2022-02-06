<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subcategory::create([
            'objectOrder' => 1,
            'name' => 'Entstehung des Geldes',
            'image' => '1.png',
            'active' => 0,
            'category_id' => 1
        ]);

        Subcategory::create([
            'objectOrder' => 2,
            'name' => 'Inflation und Deflation',
            'image' => '2.png',
            'active' => 0,
            'category_id' => 1
        ]);

        Subcategory::create([
            'objectOrder' => 3,
            'name' => 'Assetarten',
            'image' => '3.png',
            'active' => 0,
            'category_id' => 1
        ]);

        Subcategory::create([
            'objectOrder' => 4,
            'name' => 'Kontenpläne',
            'image' => '4.png',
            'active' => 0,
            'category_id' => 1
        ]);

        Subcategory::create([
            'objectOrder' => 5,
            'name' => 'Sparpläne',
            'image' => '5.png',
            'active' => 0,
            'category_id' => 1
        ]);

        Subcategory::create([
            'objectOrder' => 6,
            'name' => 'ETF',
            'image' => '6.png',
            'active' => 0,
            'category_id' => 1
        ]);

        Subcategory::create([
            'objectOrder' => 7,
            'name' => 'Kryptos',
            'image' => '7.png',
            'active' => 0,
            'category_id' => 1
        ]);

        Subcategory::create([
            'objectOrder' => 8,
            'name' => 'Aktien',
            'image' => '8.png',
            'active' => 0,
            'category_id' => 1
        ]);





        Subcategory::create([
            'objectOrder' => 1,
            'name' => 'Domäne / Active Directory',
            'image' => '11.png',
            'active' => 0,
            'category_id' => 2
        ]);

        Subcategory::create([
            'objectOrder' => 2,
            'name' => 'MS Endpoint Manager',
            'image' => '12.png',
            'active' => 0,
            'category_id' => 2
        ]);

        Subcategory::create([
            'objectOrder' => 3,
            'name' => 'Application Management',
            'image' => '13.png',
            'active' => 0,
            'category_id' => 2
        ]);

        Subcategory::create([
            'objectOrder' => 4,
            'name' => 'Data Interfaces',
            'image' => '14.png',
            'active' => 0,
            'category_id' => 2
        ]);

        Subcategory::create([
            'objectOrder' => 5,
            'name' => 'Data Warehouse',
            'image' => '15.png',
            'active' => 0,
            'category_id' => 2
        ]);

        Subcategory::create([
            'objectOrder' => 6,
            'name' => 'Deployment',
            'image' => '16.png',
            'active' => 0,
            'category_id' => 2
        ]);





        Subcategory::create([
            'objectOrder' => 1,
            'name' => 'Supply Chain',
            'image' => '21.png',
            'active' => 0,
            'category_id' => 3
        ]);

        Subcategory::create([
            'objectOrder' => 2,
            'name' => 'ERP Systeme',
            'image' => '22.png',
            'active' => 0,
            'category_id' => 3
        ]);

        Subcategory::create([
            'objectOrder' => 3,
            'name' => 'WMS Systeme',
            'image' => '23.png',
            'active' => 0,
            'category_id' => 3
        ]);

        Subcategory::create([
            'objectOrder' => 4,
            'name' => 'CRM Systeme',
            'image' => '24.png',
            'active' => 0,
            'category_id' => 3
        ]);
    }
}

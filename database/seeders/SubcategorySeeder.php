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
            'name' => 'Entstehung des Geldes',
            'active' => 0,
            'category_id' => 1
        ]);

        Subcategory::create([
            'name' => 'Inflation und Deflation',
            'active' => 0,
            'category_id' => 1
        ]);

        Subcategory::create([
            'name' => 'Assetarten',
            'active' => 0,
            'category_id' => 1
        ]);

        Subcategory::create([
            'name' => 'Kontenpläne',
            'active' => 0,
            'category_id' => 1
        ]);

        Subcategory::create([
            'name' => 'Sparpläne',
            'active' => 0,
            'category_id' => 1
        ]);

        Subcategory::create([
            'name' => 'ETF',
            'active' => 0,
            'category_id' => 1
        ]);

        Subcategory::create([
            'name' => 'Kryptos',
            'active' => 0,
            'category_id' => 1
        ]);

        Subcategory::create([
            'name' => 'Aktien',
            'active' => 0,
            'category_id' => 1
        ]);

        Subcategory::create([
            'name' => 'Domäne / Active Directory',
            'active' => 0,
            'category_id' => 2
        ]);

        Subcategory::create([
            'name' => 'MS Endpoint Manager',
            'active' => 0,
            'category_id' => 2
        ]);

        Subcategory::create([
            'name' => 'Application Management',
            'active' => 0,
            'category_id' => 2
        ]);

        Subcategory::create([
            'name' => 'Data Interfaces',
            'active' => 0,
            'category_id' => 2
        ]);

        Subcategory::create([
            'name' => 'Data Warehouse',
            'active' => 0,
            'category_id' => 2
        ]);

        Subcategory::create([
            'name' => 'Deployment',
            'active' => 0,
            'category_id' => 2
        ]);

        Subcategory::create([
            'name' => 'Supply Chain',
            'active' => 0,
            'category_id' => 3
        ]);

        Subcategory::create([
            'name' => 'ERP Systeme',
            'active' => 0,
            'category_id' => 3
        ]);

        Subcategory::create([
            'name' => 'WMS Systeme',
            'active' => 0,
            'category_id' => 3
        ]);

        Subcategory::create([
            'name' => 'CRM Systeme',
            'active' => 0,
            'category_id' => 3
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\StartupCategory;
use Illuminate\Database\Seeder;

class StartupCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $startupCategories = [
            ['id' => 1, 'startup_category_name' => 'RENEWABLE ENERGY AND INFRASTRUCTURE'],
            ['id' => 2, 'startup_category_name' => 'MOBILITY AND HOSPITALITY'],
            ['id' => 3, 'startup_category_name' => 'SUSTAINABLE URBANIZATION'],
            ['id' => 4, 'startup_category_name' => 'WATER AND WASTE MANAGEMENT'],
            ['id' => 5, 'startup_category_name' => 'DIGITAL TRANSFORMATION AND INNOVATION'],
            ['id' => 6, 'startup_category_name' => 'RESILIENCE AND CLIMATE ADAPTATION'],
        ];

        foreach ($startupCategories as $startupCategory) {
            StartupCategory::updateOrCreate($startupCategory);
        }
    }
}

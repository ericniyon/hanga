<?php

namespace Database\Seeders;

use App\Models\StartupSubCategory;
use Illuminate\Database\Seeder;

class StartupSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $startupSubCategories = [
            ['id' => 1, 'startup_sub_category_name' => 'Sustainable energy supply', 'startup_category_id' => '1'],
            ['id' => 2, 'startup_sub_category_name' => 'Affordable housing', 'startup_category_id' => '1'],
            ['id' => 3, 'startup_sub_category_name' => 'PPPs and Investment', 'startup_category_id' => '1'],
            ['id' => 4, 'startup_sub_category_name' => 'Construction technology and building materials', 'startup_category_id' => '1'],

            ['id' => 5, 'startup_sub_category_name' => 'Transportation and access to urban services', 'startup_category_id' => '2'],
            ['id' => 6, 'startup_sub_category_name' => 'Sharing economy (rides, rooms, facilities)', 'startup_category_id' => '2'],
            ['id' => 7, 'startup_sub_category_name' => 'Beating traffic and pollution', 'startup_category_id' => '2'],

            ['id' => 8, 'startup_sub_category_name' => 'Affordable Housing', 'startup_category_id' => '3'],
            ['id' => 9, 'startup_sub_category_name' => 'Green Building', 'startup_category_id' => '3'],
            ['id' => 10, 'startup_sub_category_name' => 'Smart Living: citizen services, health, education', 'startup_category_id' => '3'],

            ['id' => 11, 'startup_sub_category_name' => 'Sustainable water resources management.', 'startup_category_id' => '4'],
            ['id' => 12, 'startup_sub_category_name' => 'Waste: reduce, reuse, recycle', 'startup_category_id' => '4'],
            ['id' => 13, 'startup_sub_category_name' => 'Tackling air pollution', 'startup_category_id' => '4'],

            ['id' => 14, 'startup_sub_category_name' => 'e-Government, citizen participation, services', 'startup_category_id' => '5'],
            ['id' => 15, 'startup_sub_category_name' => 'Connectivity, Commerce.', 'startup_category_id' => '5'],
            ['id' => 16, 'startup_sub_category_name' => 'Innovation and jobs of the future', 'startup_category_id' => '5'],

            ['id' => 17, 'startup_sub_category_name' => 'Disaster preparedness & resilience', 'startup_category_id' => '6'],
            ['id' => 18, 'startup_sub_category_name' => 'Smart urban agriculture and food systems', 'startup_category_id' => '6'],
            ['id' => 19, 'startup_sub_category_name' => 'Nature-based solutions', 'startup_category_id' => '6'],
        ];


        foreach ($startupSubCategories as $startupSubCategory) {
            StartupSubCategory::updateOrCreate($startupSubCategory);
        }
    }
}

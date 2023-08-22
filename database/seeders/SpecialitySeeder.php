<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialties = [
            ['id'=>1, 'name'=>'Ecommerce & Digital Platforms'],
            ['id'=>2, 'name'=>'Online Presence &Device Access'],
            ['id'=>3, 'name'=>'Digital Business Skills&Training'],
            ['id'=>4, 'name'=>'Digital Marketing & Promotion'],
            ['id'=>5, 'name'=>'Digital Enabled Sales & Transactions'],
            ['id'=>6, 'name'=>'Digital Financial Services'],
            ['id'=>7, 'name'=>'E-commerce Logistics & Delivery'],
        ];
        foreach ($specialties as $key => $specialty) {
            Specialty::updateOrCreate($specialty);
        }
    }
}

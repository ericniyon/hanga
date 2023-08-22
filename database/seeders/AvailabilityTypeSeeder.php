<?php

namespace Database\Seeders;

use App\Models\AvailabilityType;
use Illuminate\Database\Seeder;

class AvailabilityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Full-time', 'Part-time ', 'Flexible'];

        AvailabilityType::truncate();
        foreach ($types as $type) {
            AvailabilityType::create(['name' => $type]);
        }

    }
}

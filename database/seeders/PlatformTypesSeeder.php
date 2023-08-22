<?php

namespace Database\Seeders;

use App\Models\PlatformType;
use Illuminate\Database\Seeder;

class PlatformTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Web application', 'Android ', 'iOs', 'Desktop'];

        PlatformType::truncate();
        foreach ($types as $type) {
            PlatformType::create(['name' => $type]);
        }
    }
}

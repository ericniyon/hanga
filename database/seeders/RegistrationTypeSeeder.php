<?php

namespace Database\Seeders;

use App\Models\RegistrationType;
use Illuminate\Database\Seeder;

class RegistrationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['DSP', 'iWorker', 'MSME'];

        RegistrationType::truncate();

        foreach ($types as $type) {
            RegistrationType::create([
                'name' => $type
            ]);
        }
    }
}

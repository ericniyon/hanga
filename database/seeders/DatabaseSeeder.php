<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(3)->create();
        $this->call([
            UserTableSeeder::class,
            PlatformTypesSeeder::class,
            RegistrationTypeSeeder::class,
            // SClientSeeder::class,
            StartupCategorySeeder::class,
            StartupSubCategorySeeder::class,
        ]);
        // \App\Models\Client::factory(3)->create()
    }
}

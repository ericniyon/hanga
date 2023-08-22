<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\RegistrationType;
use Illuminate\Database\Seeder;
use Str;


class SClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reg_type = RegistrationType::all()->pluck('id')->toArray();
        $clients = [
            [
                'name' => $this->faker->name(),
                'email' => 'niyoeri6@gmail.com',
                'phone' => $this->faker->phoneNumber(),
                'otp' => $this->faker->numberBetween(1000, 9000),
                'registration_type_id' => $this->faker->randomElement($reg_type),
                'allow_notification_sound' => 1,
                'is_active' => 1,
                'first_name' => $this->faker->firstName(),
                'last_name' => $this->faker->lastName(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(1),
            ]
        ];

        foreach ($clients as $client) {
            Client::updateOrCreate($client);
        }
    }
}

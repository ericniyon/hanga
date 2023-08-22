<?php

namespace Database\Factories;

use App\Models\RegistrationType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $reg_type = RegistrationType::all()->pluck('id')->toArray();
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone'=>$this->faker->phoneNumber(),
            'otp'=>$this->faker->numberBetween(1000, 9000),
            'registration_type_id'=>$this->faker->randomElement($reg_type),
            'allow_notification_sound'=>1,
            'is_active'=>1,
            'first_name'=>$this->faker->firstName(),
            'last_name'=>$this->faker->lastName(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
}

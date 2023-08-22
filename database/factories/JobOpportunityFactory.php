<?php

namespace Database\Factories;

use App\Models\JobOpportunity;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobOpportunityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JobOpportunity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return
        [
            'logo' =>$this->faker->imageUrl($width = 640, $height = 480),
            'company_name' =>$this->faker->name,
            'job_title' =>$this->faker->text,
            'opportunity_type_id' =>$this->faker->numberBetween(1,3),
            'job_details' =>$this->faker->sentence(30),
            'link' =>$this->faker->url,
            'attachment' =>$this->faker->imageUrl($width = 640, $height = 480),
            'deadline' =>$this->faker->dateTime(),
        ];
    }
}

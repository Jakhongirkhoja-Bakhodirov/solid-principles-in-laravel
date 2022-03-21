<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $job_titles = ['CTO', 'CEO', 'Developer'];
        return [
            'job_title' => $job_titles[rand(0, 2)],
            'first_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'email' => $this->faker->email,
            'start_date' => now()->subDays(rand(10, 5000))
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nim' => $this->faker->unique()->numerify('20205730100##'),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->freeEmail(),
            'department_id' => mt_rand(1,7)
        ];
    }
}

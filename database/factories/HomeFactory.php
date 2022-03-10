<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'      => $this->faker->numberBetween(100000),
            'pref_id' => $this->faker->numberBetween(1, 47),
            'name'    => $this->faker->name,
            'company' => $this->faker->company,
            'tel'     => $this->faker->phoneNumber,
            'address' => $this->faker->address,
        ];
    }
}

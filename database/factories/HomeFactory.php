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
            'id'      => 1,
            'pref_id' => 1,
            'name'    => $this->faker->name,
            'company' => $this->faker->company,
            'tel'     => $this->faker->phoneNumber,
            'address' => $this->faker->address,
        ];
    }
}

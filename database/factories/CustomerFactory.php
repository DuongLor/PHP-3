<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
						'name' => $this->faker->name,
						'date_of_birth' => $this->faker->date(),
						'address' => $this->faker->address,
						'status' => 'active',
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
			//đây là nơi định nghịa factory fake vào bảng
        return [
						'name' => $this->faker->name,
						'email' => $this->faker->unique()->safeEmail,
						'address' => $this->faker->address,
						'status' => 1,
						'date_of_birth' => $this->faker->date,
            //
        ];
    }
}

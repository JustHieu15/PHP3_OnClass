<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "totalPrice" => $this->faker->numberBetween(1000, 10000),
            "user_id" => User::all()->random()->user_id,
            "created_at" => $this->faker->dateTime(),
            "updated_at" => $this->faker->dateTime(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order_detail;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order_detail>
 */
class Order_detailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "order_id" => Order::all()->random()->order_id,
            "product_id" => Product::all()->random()->product_id,
            "quantity" => $this->faker->numberBetween(1, 20),
            "price" => $this->faker->randomFloat(2, 100, 1000000),
            "created_at" => $this->faker->dateTime(),
            "updated_at" => $this->faker->dateTime(),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->sentence(mt_rand(1, 2)),
            'price' => $this->faker->numberBetween(1000, 100000),
            'description' => $this->faker->paragraph(),
            'product_rate' => $this->faker->numberBetween(1, 5),
            'stock' => $this->faker->numberBetween(1000, 100000),
            'weight' => $this->faker->numberBetween(1, 20)
        ];
    }
}

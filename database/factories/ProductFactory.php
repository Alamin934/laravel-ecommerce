<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'title' => fake()->unique()->catchPhrase(),
           'category_id' => \App\Models\Category::all()->random()->id,
           'description' => fake()->realText(),
           'price' => random_int(100, 1000),
        ];
    }
}

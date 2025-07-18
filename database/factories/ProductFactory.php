<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->words(2, true);

        return [
            'name' => ucfirst($name),
            'sku' => strtoupper(Str::random(8)),
            'category' => $this->faker->randomElement(['Electronics', 'Clothing', 'Books', 'Furniture', 'Beauty']),
            'description' => $this->faker->sentence(12),
            'price' => $this->faker->randomFloat(2, 50, 999),
            'stock' => $this->faker->numberBetween(0, 100),
            'is_active' => $this->faker->boolean(90),
        ];
    }
}


<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $products = [
            'Laptop',
            'Smartphone',
            'Desk Chair',
            'Coffee Mug',
            'Headphones',
            'Backpack',
            'Notebook',
            'Water Bottle',
            'Keyboard',
            'Mouse',
            'Monitor',
            'Table Lamp',
            'Sofa',
            'Shoes',
            'Watch',
        ];
        $name = $this->faker->randomElement($products);
        return [
            //
            'name' => $name,
            'slug' => Str::slug($name . '-' . uniqid()),
            'page_title' => $name,
            'price' => $this->faker->randomFloat(2, 10, 2000), // 2 decimals, between 10–2000
            'stock' => $this->faker->numberBetween(0, 100),
        ];
    }
}

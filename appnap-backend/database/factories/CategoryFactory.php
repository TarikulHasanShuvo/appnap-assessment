<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $sizes = ['S', 'M', 'L', 'XL', 'XXL'];
        return [
            'name' => fake()->name,
            'size' => $sizes[rand(0, count($sizes) - 1)]
        ];
    }
}

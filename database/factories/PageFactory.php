<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'header_title' => $this->faker->word,
            'hero_title' => $this->faker->word,
            'hero_description' => $this->faker->paragraph,
            'hero_image' => 'header_image.png',
            'hero_button_title' => $this->faker->word,
            'hero_button_color' => collect([
                'primary',
                'secondary',
                'success',
                'danger',
                'warning',
                'info',
                'light',
                'dark',
                'link'
            ])->random(),
        ];
    }
}

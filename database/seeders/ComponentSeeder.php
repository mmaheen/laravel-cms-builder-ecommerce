<?php

namespace Database\Seeders;

use App\Models\Component;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = \Faker\Factory::create();
        $components = [
            [
                'name' => 'header',
                'position' => 1,
                'page_id' => 1,
                'data' => [
                    'header_title' => $faker->sentence(3),
                    'sections' => [
                        'home',
                        'hero',
                        'feature',
                        'parts',
                        'tutorial',
                        'gallery',
                        'contact',
                    ],
                ]
            ],
            [
                'name' => 'hero',
                'position' => 2,
                'page_id' => 1,
                'data' => [
                    'hero_image' => 'header_image.png',
                    'hero_title' => $faker->sentence(3),
                    'hero_description' => $faker->paragraph,
                    'hero_button_color' => $faker->randomElement([
                        'primary',
                        'secondary',
                        'success',
                        'danger',
                        'warning',
                        'info',
                        'light',
                        'dark',
                        'link'
                    ]),
                    'hero_button_title' => $faker->word,
                    'hero_price' => $faker->numberBetween(100, 10000),
                ],
            ],
            [
                'name' => 'feature',
                'position' => 3,
                'page_id' => 1,
                'data' => [
                    'feature_title' => $faker->sentence(3),
                    'feature_description' => $faker->paragraph,
                ]
            ],
            ['name' => 'tutorial', 'position' => 4, 'page_id' => 1, 'data' => []],
            ['name' => 'gallery', 'position' => 5, 'page_id' => 1, 'data' => []],
            ['name' => 'contact', 'position' => 6, 'page_id' => 1, 'data' => []],
            ['name' => 'footer', 'position' => 7, 'page_id' => 1, 'data' => []],
        ];

        foreach ($components as $component) {
            Component::create($component);
        }

    }
}

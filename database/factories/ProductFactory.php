<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $categories = ['Softdrink', 'Junkfood', 'Fruit'];
        $category = $this->faker->randomElement($categories);

        // Daftar merek softdrink
        $softdrinkBrands = [
            'Coca-Cola',
            'Pepsi',
            'Fanta',
            'Sprite',
            '7Up',
            'Mountain Dew',
            'Dr Pepper',
            'Mirinda',
            'Thums Up',
            'RC Cola'
        ];

        // Daftar merek junkfood
        $junkfoodBrands = [
            'McDonald\'s',
            'Burger King',
            'KFC',
            'Pizza Hut',
            'Subway',
            'Domino\'s',
            'Taco Bell',
            'Wendy\'s',
            'Dunkin\' Donuts',
            'Papa John\'s'
        ];

        // Daftar merek fruit
        $fruitBrands = [
            'Chiquita',
            'Dole',
            'Del Monte',
            'Sunkist',
            'Tropicana',
            'Zespri',
            'Pink Lady',
            'Cuties',
            'Halos',
            'Wonderful'
        ];

        $name = $category == 'Softdrink'
            ? $this->faker->randomElement($softdrinkBrands)
            : ($category == 'Junkfood'
                ? $this->faker->randomElement($junkfoodBrands)
                : $this->faker->randomElement($fruitBrands));

        $description = $category == 'Softdrink'
            ? $this->faker->randomElement([
                'Minuman ringan menyegarkan dengan rasa yang nikmat.',
                'Dilengkapi dengan berbagai rasa buah yang menyegarkan.',
                'Minuman bersoda yang cocok untuk semua acara.'
            ])
            : ($category == 'Junkfood'
                ? $this->faker->randomElement([
                    'Makanan cepat saji dengan rasa yang lezat dan menggugah selera.',
                    'Pilihan makanan yang praktis dan cepat untuk dinikmati.',
                    'Makanan yang cocok untuk santap bersama keluarga dan teman.'
                ])
                : $this->faker->randomElement([
                    'Buah segar dengan kualitas terbaik dan rasa yang manis.',
                    'Sumber vitamin dan nutrisi yang baik untuk kesehatan.',
                    'Buah yang siap dinikmati kapan saja dan di mana saja.'
                ]));

        return [
            'name' => $name,
            'description' => $description,
            'price' => $this->faker->numberBetween(10000, 100000),
            'image' => $this->faker->imageUrl(640, 480, 'product', true),
            'category_id' => $category == 'Softdrink' ? 1 : ($category == 'Junkfood' ? 2 : 3),
            'expired_at' => now()->addDays(30),
            'modified_by' => $this->faker->randomElement(['user@gmail.com', 'arya@gmail.com'])
        ];
    }
}
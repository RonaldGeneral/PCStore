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
            //
        ];
    }
}

// INSERT INTO `category_attribute` (`id`, `name`, `category`, `sort`) VALUES (NULL, 'Processor', 'laptop', '1');
// INSERT INTO `category_attribute` (`id`, `name`, `category`, `sort`) VALUES (NULL, 'Graphics', 'laptop', '2');
// INSERT INTO `category_attribute` (`id`, `name`, `category`, `sort`) VALUES (NULL, 'Memory', 'laptop', '3');
// INSERT INTO `category_attribute` (`id`, `name`, `category`, `sort`) VALUES (NULL, 'Storage', 'laptop', '4');
// INSERT INTO `category_attribute` (`id`, `name`, `category`, `sort`) VALUES (NULL, 'Operating System', 'laptop', '5');
// INSERT INTO `category_attribute` (`id`, `name`, `category`, `sort`) VALUES (NULL, 'Processor', 'prebuilt', '1');
// INSERT INTO `category_attribute` (`id`, `name`, `category`, `sort`) VALUES (NULL, 'Graphics', 'prebuilt', '2');
// INSERT INTO `category_attribute` (`id`, `name`, `category`, `sort`) VALUES (NULL, 'Memory', 'prebuilt', '3');
// INSERT INTO `category_attribute` (`id`, `name`, `category`, `sort`) VALUES (NULL, 'Storage', 'prebuilt', '4');
// INSERT INTO `category_attribute` (`id`, `name`, `category`, `sort`) VALUES (NULL, 'Operating System', 'prebuilt', '5');
// INSERT INTO `category_attribute` (`id`, `name`, `category`, `sort`) VALUES (NULL, 'Power Supply', 'prebuilt', '6');
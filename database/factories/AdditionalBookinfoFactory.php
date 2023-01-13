<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdditionalBookinfo>
 */
class AdditionalBookinfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'page' => $this->faker->numberBetween(50, 200),
            'language' => $this->faker->languageCode(),
            'weight' => $this->faker->numberBetween(10, 50),
            'book_id' => Book::factory()
        ];
    }
}

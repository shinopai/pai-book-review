<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->city,
            'explanation' => $this->faker->realText(rand(100, 300)),
            'published_at' => $this->faker->date,
            'genre_id' => rand(1, 12),
            'publisher_id' => rand(1, 43)
        ];
    }
}

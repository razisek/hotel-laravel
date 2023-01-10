<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'check_in_time' => '12:00:00',
            'check_out_time' => '14:00:00',
            'website' => $this->faker->url,
            'address' => $this->faker->address,
            'policy' => $this->faker->text,
            'city' => $this->faker->randomElement(['Magelang', 'Bandung', 'Jakarta', 'Yogyakarta', 'Surabaya', 'Semarang', 'Bali', 'Surakarta']),
            'star_rating' => $this->faker->numberBetween(1, 5),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'status' => $this->faker->randomElement([0, 1]),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
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
            'capacity' => $this->faker->numberBetween(1, 6),
            'room_size' => $this->faker->numberBetween(10, 100),
            'with_breakfast' => $this->faker->boolean,
            'has_wifi' => $this->faker->boolean,
            'property_id' => \App\Models\Property::factory(),
        ];
    }
}

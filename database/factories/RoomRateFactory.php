<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RoomRate>
 */
class RoomRateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'room_id' => \App\Models\Room::factory(),
            'price' => $this->faker->numberBetween(150000, 1000000),
            'date' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
        ];
    }
}

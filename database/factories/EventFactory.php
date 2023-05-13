<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "event_name"=>fake()->name(),
            "description"=>fake()->sentence(),
            "number_of_tickets"=>fake()->numberBetween(200, 20000),
            "sport_id"=>fake()->numberBetween(1,10),
            "location_id"=>fake()->numberBetween(1,10),
            "team_id"=>fake()->numberBetween(1,10),
            "schedule_id"=>fake()->numberBetween(1,10),
        ];
    }
}

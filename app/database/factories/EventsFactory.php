<?php

namespace Database\Factories;

class EventsFactory
{
    public function create(): array
    {
        return [
            'id' => fake()->numberBetween(10, 15),
            'showId' => fake()->numberBetween(10, 15),
            'date' => fake()->date('Y-m-d H:i:s'),
        ];
    }
}
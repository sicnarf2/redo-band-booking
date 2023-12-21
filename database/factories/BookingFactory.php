<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Booking::class;

    public function definition()
    {
        // $bandIds = \App\Models\Band::pluck('id')->toArray();

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'booking_time' => $this->faker->time,
            'booking_date' => $this->faker->date,
            'band_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Band>
 */
class BandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Band::class;

    public function definition()
    {
        return [
            'band_name' => $this->faker->company,
            'genre' => $this->faker->word,
            'year_started' => $this->faker->year,
            'membersCount' => $this->faker->numberBetween(1, 10),
        ];
    }
}

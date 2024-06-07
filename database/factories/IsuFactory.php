<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Isu>
 */
class IsuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'isu_nama' => $this->faker->name,
            'isu_keterangan' => $this->faker->text($maxNbChars = 200),
        ];
    }
}

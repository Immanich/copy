<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cars>
 */

class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $make = (['Toyota', 'Toyota', 'Toyota']);

        $model = ([
            'Hilux',
            'Prado',
            'Land Cruiser',
            'Fortuner',
            'Vios'
        ]);

        $color = ([
            'Super White',
            'Emotional Red',
            'Attitude Black Mica',
            'Navy Blue',
        ]);

        $transmission = ([
            'AT',
            'MT'
        ]);

        return [
            'make' => fake() -> randomElement($make),
            'model' => fake() -> randomElement($model),
            'year' => fake() -> numberBetween(2015, 2023),
            'color' => fake() -> randomElement($color),
            'transmission' => fake() -> randomElement($transmission),
            'price' => fake() -> randomFloat(2, 10000.00, 300000.00),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Vehicle;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => fake() -> randomElement(Customer::pluck('id')),
            'vehicle_id' => fake() -> randomElement(Vehicle::pluck('id')),
            'quantity' => fake() -> numberBetween(1, 5),
            'total_amount' => fake() -> randomFloat(2, 10000, 200000),
        ];
    }
}

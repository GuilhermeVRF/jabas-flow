<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Budget>
 */
class BudgetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3), 
            'amount' => $this->faker->randomFloat(2, 10, 1000), 
            'billing_date' => $this->faker->dateTimeBetween('-1 year', '+1 year'), 
            'type' => $this->faker->randomElement(['expense', 'income']),
            'status' => $this->faker->randomElement(['canceled', 'pending', 'paid']), 
            'description' => $this->faker->paragraph,
            'user_id' => User::first()->id, 
            'category_id' => Category::first()->id, 
            'recurrence_id' => null, 
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\TaskManager;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TaskFactory extends Factory
{

    protected $model = TaskManager::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(3),
            'is_completed' => fake()->boolean(50),
        ];
    }
}

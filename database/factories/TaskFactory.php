<?php

namespace Database\Factories;

use App\Models\{Task, User, Project};

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'task_name' => $this->faker->words(5, true),
            'task_description' => $this->faker->text(100),
            'link' => $this->faker->url,
            'task_duration' => $this->faker->time('H:i'),
            'task_starting_date' => $this->faker->date(now()),
            'quoted' => $this->faker->boolean,
            'quotation_ref' => Str::random(10),
            'billed' => $this->faker->boolean,
            'bill_num' => Str::random(10),
            'user_id' => User::factory(),
            'project_id' => Project::factory(),
        ];
    }
}

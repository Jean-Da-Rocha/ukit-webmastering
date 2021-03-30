<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'name' => $this->faker->words(5, true),
            'description' => $this->faker->text(100),
            'duration' => $this->faker->time('H:i'),
            'starting_date' => $this->faker->date(now()),
            'quoted' => $this->faker->boolean,
            'quotation_ref' => Str::random(10),
            'billed' => $this->faker->boolean,
            'bill_num' => Str::random(10),
            // We only assign authorized users for the project.
            // Authorized users are specified in App\Models\Project file
            // during the `created` model event.
            'user_id' => User::inRandomOrder()
                ->whereIn('id', Project::inRandomOrder()->first()->authorizations)
                ->first()
                ->id,
            'project_id' => Project::inRandomOrder()->first()->id,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\{User, Project, Category, Customer};

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_name' => $this->faker->words(5, true),
            'project_description' => $this->faker->text(200),
            'project_starting_date' => $this->faker->date(now()),
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'customer_id' => Customer::factory(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Hosting;
use App\Models\Project;
use App\Models\Server;
use Illuminate\Database\Eloquent\Factories\Factory;

class HostingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hosting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'domain_name' => $this->faker->domainName,
            'renewal_date' => $this->faker->dateTimeBetween('01/01/2021', '01/01/2022'),
            'domain_managing' => $this->faker->boolean,
            'registrar' => $this->faker->numberBetween(1, 100),
            'pricing' => $this->faker->randomNumber(2),
            'comment' => $this->faker->text(20),
            'customer_id' => Customer::inRandomOrder()->first()->id,
            'project_id' => Project::inRandomOrder()->first()->id,
            'billing_status_id' => $this->faker->numberBetween(1, 6),
            'server_id' => Server::inRandomOrder()->first()->id,
        ];
    }
}

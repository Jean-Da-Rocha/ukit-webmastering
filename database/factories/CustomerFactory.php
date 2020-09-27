<?php

namespace Database\Factories;

use App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'society_name' => $this->faker->company,
            'designation' => $this->faker->firstName . ' ' . $this->faker->lastName,
            'address' => $this->faker->streetAddress,
            'zip_code' => $this->faker->postcode,
            'city' => $this->faker->city,
            'phone_number' => $this->faker->e164PhoneNumber,
            'customer_email' => $this->faker->safeEmail,
        ];
    }
}

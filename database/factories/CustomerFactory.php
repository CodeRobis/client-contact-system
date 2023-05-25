<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Company;
use Faker\Generator as Faker;
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
        $faker = \Faker\Factory::create('lt_LT'); // Use Lithuanian locale

        return [
            'name' => $faker->firstName,
            'surname' => $faker->lastName,
            'phone' => $faker->phoneNumber,
            'email' => $faker->email,
            'company_id' => function () {
                return Company::factory()->create()->id;
            },
        ];
    }
}

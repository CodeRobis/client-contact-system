<?php

namespace Database\Factories;

use App\Models\Company;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('lt_LT'); // Use Lithuanian locale

        return [
            'name' => $faker->company,
            'address' => $faker->address,
        ];
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Company;
use Database\Factories\CustomerFactory;
use Database\Factories\CompanyFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 25 companies
        Company::factory()->count(25)->create();

        // Create 100 customers
        Customer::factory()->count(100)->create();
    }
}

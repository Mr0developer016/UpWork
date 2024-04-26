<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->count(10)
            ->create();

        $this->call([
            LocationSeeder::class,
            CategorySeeder::class,
            ExperienceSeeder::class,
            VacancySeeder::class,
            ContactSeeder::class,
        ]);

        Vacancy::factory()
            ->count(600)
            ->create();
    }
}

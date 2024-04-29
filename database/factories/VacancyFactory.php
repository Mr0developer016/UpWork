<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Salary;
use App\Models\Location;
use App\Models\User;
use App\Models\Experience;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        $location = Location::inRandomOrder()->first();
        $category = Category::with('category')->inRandomOrder()->first();
        $experience = Experience::inRandomOrder()->first();
        $contact = Contact::inRandomOrger()->first();
        $salary = Salary::inRandomOrder()->first();
        $createdAt = fake()->dateTimeBetween('-6 months', 'now');
        return [
            'user_id' => $user->id,
            'location_id' => $location->id,
            'category_id' => $category->category_id,
            'experience_id' => $experience->id,
            'salary_id' => $salary->id,
            'title' =>$category->name   . ' ' .$experience->name   . ' ' .$salary->name. ' ' . $contact->name,
            'body' => fake()->paragraph(rand(1, 3)),
            'price' => fake()->numberBetween(100, 500) * 1000,
            'credit' => fake()->boolean(10),
            'exchange' => fake()->boolean(30),
            'created_at' => Carbon::parse($createdAt),
            'updated_at' => Carbon::parse($createdAt)->addDays(rand(0, 6))->addHours(rand(0, 23))->addMinutes(rand(0, 59)),
        ];
    }
}

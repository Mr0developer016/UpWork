<?php

// app/Models/User.php

namespace App\Models;

// use database\factories\UserFactory.php;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return $this->hasMany(vacancies::class);
        
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    public function salaries()
    {
        return $this->hasMany(Salaries::class);
    }

    public function vacanciess()
    {
        return $this->hasMany(Vacancies::class);
    }
}

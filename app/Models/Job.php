<?php

// app/Models/Job.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['user_id', 'category_id', 'Experience_id', 'salary_id', 'contact_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories()
    {
        return $this->hasMany(Categories::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experiences::class);
    }

    public function salaries()
    {
        return $this->hasMany(salaries::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contacts::class);
    }
}


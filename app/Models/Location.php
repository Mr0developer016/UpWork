<?php
//app/Models/Review.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['job_id', 'vacancy_id', 'user_id'];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function vacancy()
    {
        return $this->belongsTo(User::class, 'vacancy_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function categories()
    {
        return $this->hasMany(Categories::class)
            ->orderBy('name');
    }


    public function vacancy()
    {
        return $this->hasMany(vacancies::class);
    }
}

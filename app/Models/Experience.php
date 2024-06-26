<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function experiences()
    {
        return $this->hasMany(experience::class);
    }
}

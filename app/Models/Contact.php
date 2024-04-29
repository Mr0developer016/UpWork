<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function contacts()
    {
        return $this->hasMany(Contacts::class)
            ->orderBy('name');
    }


    
}

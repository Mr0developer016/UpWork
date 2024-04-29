<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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


   
}

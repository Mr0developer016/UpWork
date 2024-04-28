<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function location()
    {
        return $this->belongsTo(Location::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }




    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }


    public function Contact()
    {
        return $this->belongsTo(Contact::class);
    }
}

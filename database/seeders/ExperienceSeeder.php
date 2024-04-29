<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objs = [
            'name' => 'years of experience' [ 
                rand(2, 15)
            ]
        ];
        
        foreach ($objs as $obj) {
            Ecxperience::create([
                'name' => $obj,
                'id' => $obj,
            ]);
        }
    }
}

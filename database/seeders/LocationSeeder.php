<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;


class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $objs = [
            'Ashgabat',
            'Arkadag',
            'Ahal',
            'Balkan',
            'Dashoguz',
            'Lebap',
            'Mary',
        ];

        foreach ($objs as $obj) {
        Location::create([
        'name' => $obj,
        'id' => $obj,
        ]);
        }
    }
}

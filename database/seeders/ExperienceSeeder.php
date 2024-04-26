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
            'name' => [
                rand(2, 15)
            ]
        ];
        foreach ($objs as $obj) {
            $experience = Experience::create([
                'name' => $obj['name'],
            ]);

            foreach ($obj['models'] as $model) {
                Experience::create([
                    'experience_id' => $experience->id,
                    'name' => $model,
                ]);
            }
        }
    }
}

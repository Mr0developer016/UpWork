<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objs = [
            'name' => [ rand
            (1, 5) *1000
            ]            
        ];
        foreach ($objs as $obj) {
            $salary = Salary::create([
                'name' => $obj['name'],
            ]);

            foreach ($obj['models'] as $model) {
                Salary::create([
                    'salary_id' => $salary->id,
                    'name' => $model,
                ]);
            }
        }
    }
}

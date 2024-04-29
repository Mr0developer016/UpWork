<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $objs = [
                ['name' => 'Teacher', 'models' => [
                    'Computer_10', 'English', 'Physics', 'ART', 'Math',
                ]],
                ['name' => 'Manager', 'models' => [
                    'Managment, Problem Solving, Communication ', 
                ]],
                ['name' => 'ML Engineer', 'models' => [
                    'Neurol Networks, Machine Learning, Pythin/R, Deep Learning, Algorithm',
                ]],
                ['name' => 'Front-end Developer', 'models' => [
                    'HTML, CSS, Bootstrap, React JS, Type Script',
                ]],
                ['name' => 'Back-end Developer', 'models' => [
                    'Laravel, Node JS, Django, Flusk, GO, API, NoSql',
                ]],
                ['name' => 'Data Analyst', 'models' => [
                    'Python Libraries, Data Visualation Tools, Deep Learning ',
                ]],
            ];
            $objs = [
                'name' => 'years of experience' [ 
                    rand(2, 15)
                ]
            ];
            $objs = [
                'Ashgabat',
                'Arkadag',
                'Ahal',
                'Balkan',
                'Dashoguz',
                'Lebap',
                'Mary',
            ];
            $objs = [
                ['name' => '+9936',(rand(111111, 999999))
    
                ]            
            ];
            $objs = [
                'name' => [ rand
                (1, 5) *1000
                ]            
            ];
    
        }
    }
}

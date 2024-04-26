<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
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

        foreach ($objs as $obj) {
            $category = Category::create([
                'name' => $obj['name'],
            ]);

            foreach ($obj['models'] as $model) {
                Category::create([
                    'category_id' => $category->id,
                    'name' => $model,
                ]);
            }
        }
    }
}

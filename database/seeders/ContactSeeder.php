<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objs = [
            ['name' => '+9936',(rand(111111, 999999))

            ]            
        ];
        foreach ($objs as $obj) {
            $contact = Contact::create([
                'name' => $obj['name'],
            ]);

            foreach ($obj['models'] as $model) {
                Category::create([
                    'contact_id' => $Category->id,
                    'name' => $model,
                ]);
            }
        }
    }
}

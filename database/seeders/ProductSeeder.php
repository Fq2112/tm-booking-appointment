<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Specialist;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach (Specialist::all() as $spc) {
            $i = rand(3,5);
            $last = Product::latest()->first();
            if($spc->name == 'Dentist') {
                Product::create([
                    'specialist_id' => $spc->id,
                    'name' => 'Root Canal',
                    'desc' => 'Root canal treatment (endodontics) is a dental procedure used to treat infection at the centre of a tooth. Root canal treatment is not painful and can save a tooth that might otherwise have to be removed completely.',
                    'price' => 300000,
                ]);

                Product::create([
                    'specialist_id' => $spc->id,
                    'name' => 'Preventative',
                    'desc' => 'Preventive dental care is key to keeping your teeth healthy throughout the course of your life. But it goes beyond that. Good oral health can impact your general health, as well.',
                    'price' => 200000,
                ]);

                Product::create([
                    'specialist_id' => $spc->id,
                    'name' => 'Dental Implants',
                    'desc' => 'Dental implants are artificial tooth roots that provide a permanent base for fixed, replacement teeth. Compared to dentures, bridges and crowns, dental implants are a popular and effective long-term solution for people who suffer from missing teeth, failing teeth or chronic dental problems.',
                    'price' => 400000,
                ]);
            } else {
                if($i == 3) {
                    Product::create([
                        'specialist_id' => $spc->id,
                        'name' => 'Product '.(is_null($last) ? 1 : $last->id + 1),
                        'desc' => 'Product '.(is_null($last) ? 1 : $last->id + 1).' is '.strtolower($faker->paragraph),
                        'price' => rand(300000,500000),
                    ]);
                    Product::create([
                        'specialist_id' => $spc->id,
                        'name' => 'Product '.(is_null($last) ? 1 : $last->id + 1),
                        'desc' => 'Product '.(is_null($last) ? 1 : $last->id + 1).' is '.strtolower($faker->paragraph),
                        'price' => rand(300000,500000),
                    ]);
                    Product::create([
                        'specialist_id' => $spc->id,
                        'name' => 'Product '.(is_null($last) ? 1 : $last->id + 1),
                        'desc' => 'Product '.(is_null($last) ? 1 : $last->id + 1).' is '.strtolower($faker->paragraph),
                        'price' => rand(300000,500000),
                    ]);
                } elseif($i == 4){
                    Product::create([
                        'specialist_id' => $spc->id,
                        'name' => 'Product '.(is_null($last) ? 1 : $last->id + 1),
                        'desc' => 'Product '.(is_null($last) ? 1 : $last->id + 1).' is '.strtolower($faker->paragraph),
                        'price' => rand(300000,500000),
                    ]);
                    Product::create([
                        'specialist_id' => $spc->id,
                        'name' => 'Product '.(is_null($last) ? 1 : $last->id + 1),
                        'desc' => 'Product '.(is_null($last) ? 1 : $last->id + 1).' is '.strtolower($faker->paragraph),
                        'price' => rand(300000,500000),
                    ]);
                    Product::create([
                        'specialist_id' => $spc->id,
                        'name' => 'Product '.(is_null($last) ? 1 : $last->id + 1),
                        'desc' => 'Product '.(is_null($last) ? 1 : $last->id + 1).' is '.strtolower($faker->paragraph),
                        'price' => rand(300000,500000),
                    ]);
                    Product::create([
                        'specialist_id' => $spc->id,
                        'name' => 'Product '.(is_null($last) ? 1 : $last->id + 1),
                        'desc' => 'Product '.(is_null($last) ? 1 : $last->id + 1).' is '.strtolower($faker->paragraph),
                        'price' => rand(300000,500000),
                    ]);
                } else {
                    Product::create([
                        'specialist_id' => $spc->id,
                        'name' => 'Product '.(is_null($last) ? 1 : $last->id + 1),
                        'desc' => 'Product '.(is_null($last) ? 1 : $last->id + 1).' is '.strtolower($faker->paragraph),
                        'price' => rand(300000,500000),
                    ]);
                    Product::create([
                        'specialist_id' => $spc->id,
                        'name' => 'Product '.(is_null($last) ? 1 : $last->id + 1),
                        'desc' => 'Product '.(is_null($last) ? 1 : $last->id + 1).' is '.strtolower($faker->paragraph),
                        'price' => rand(300000,500000),
                    ]);
                    Product::create([
                        'specialist_id' => $spc->id,
                        'name' => 'Product '.(is_null($last) ? 1 : $last->id + 1),
                        'desc' => 'Product '.(is_null($last) ? 1 : $last->id + 1).' is '.strtolower($faker->paragraph),
                        'price' => rand(300000,500000),
                    ]);
                    Product::create([
                        'specialist_id' => $spc->id,
                        'name' => 'Product '.(is_null($last) ? 1 : $last->id + 1),
                        'desc' => 'Product '.(is_null($last) ? 1 : $last->id + 1).' is '.strtolower($faker->paragraph),
                        'price' => rand(300000,500000),
                    ]);
                    Product::create([
                        'specialist_id' => $spc->id,
                        'name' => 'Product '.(is_null($last) ? 1 : $last->id + 1),
                        'desc' => 'Product '.(is_null($last) ? 1 : $last->id + 1).' is '.strtolower($faker->paragraph),
                        'price' => rand(300000,500000),
                    ]);
                }
            }
        }
    }
}

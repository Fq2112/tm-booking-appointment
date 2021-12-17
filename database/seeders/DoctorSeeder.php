<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Specialist;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
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
            $i = rand(7,9);
            if($i == 7) {
                $name = $faker->name;
                Doctor::create([
                    'specialist_id' => $spc->id,
                    'sip' => rand(100,999).'/'.strtoupper(substr($name,0,3)).'/'.rand(100,999).'/'.$faker->year(),
                    'name' => 'dr. '.$name,
                    'image' => '1.jpg',
                ]);

                $name2 = $faker->name;
                Doctor::create([
                    'specialist_id' => $spc->id,
                    'sip' => rand(100,999).'/'.strtoupper(substr($name2,0,3)).'/'.rand(100,999).'/'.$faker->year(),
                    'name' => 'dr. '.$name2,
                    'image' => '2.jpg',
                ]);

                $name3 = $faker->name;
                Doctor::create([
                    'specialist_id' => $spc->id,
                    'sip' => rand(100,999).'/'.strtoupper(substr($name3,0,3)).'/'.rand(100,999).'/'.$faker->year(),
                    'name' => 'dr. '.$name3,
                    'image' => '3.jpg',
                ]);

                $name4 = $faker->name;
                Doctor::create([
                    'specialist_id' => $spc->id,
                    'sip' => rand(100,999).'/'.strtoupper(substr($name4,0,3)).'/'.rand(100,999).'/'.$faker->year(),
                    'name' => 'dr. '.$name4,
                    'image' => '4.jpg',
                ]);

                $name5 = $faker->name;
                Doctor::create([
                    'specialist_id' => $spc->id,
                    'sip' => rand(100,999).'/'.strtoupper(substr($name5,0,3)).'/'.rand(100,999).'/'.$faker->year(),
                    'name' => 'dr. '.$name5,
                    'image' => '5.jpg',
                ]);

                $name6 = $faker->name;
                Doctor::create([
                    'specialist_id' => $spc->id,
                    'sip' => rand(100, 999) . '/' . strtoupper(substr($name6, 0, 3)) . '/' . rand(100, 999) . '/' . $faker->year(),
                    'name' => 'dr. '.$name6,
                    'image' => '6.jpg',
                ]);

                $name7 = $faker->name;
                Doctor::create([
                    'specialist_id' => $spc->id,
                    'sip' => rand(100, 999) . '/' . strtoupper(substr($name7, 0, 3)) . '/' . rand(100, 999) . '/' . $faker->year(),
                    'name' => 'dr. '.$name7,
                    'image' => '7.jpg',
                ]);
            } elseif($i == 8) {
                $name = $faker->name;
                Doctor::create([
                    'specialist_id' => $spc->id,
                    'sip' => rand(100,999).'/'.strtoupper(substr($name,0,3)).'/'.rand(100,999).'/'.$faker->year(),
                    'name' => 'dr. '.$name,
                    'image' => '1.jpg',
                ]);

                $name2 = $faker->name;
                Doctor::create([
                    'specialist_id' => $spc->id,
                    'sip' => rand(100,999).'/'.strtoupper(substr($name2,0,3)).'/'.rand(100,999).'/'.$faker->year(),
                    'name' => 'dr. '.$name2,
                    'image' => '2.jpg',
                ]);

                $name3 = $faker->name;
                Doctor::create([
                    'specialist_id' => $spc->id,
                    'sip' => rand(100,999).'/'.strtoupper(substr($name3,0,3)).'/'.rand(100,999).'/'.$faker->year(),
                    'name' => 'dr. '.$name3,
                    'image' => '3.jpg',
                ]);

                $name4 = $faker->name;
                Doctor::create([
                    'specialist_id' => $spc->id,
                    'sip' => rand(100,999).'/'.strtoupper(substr($name4,0,3)).'/'.rand(100,999).'/'.$faker->year(),
                    'name' => 'dr. '.$name4,
                    'image' => '4.jpg',
                ]);

                $name5 = $faker->name;
                Doctor::create([
                    'specialist_id' => $spc->id,
                    'sip' => rand(100,999).'/'.strtoupper(substr($name5,0,3)).'/'.rand(100,999).'/'.$faker->year(),
                    'name' => 'dr. '.$name5,
                    'image' => '5.jpg',
                ]);

                $name6 = $faker->name;
                Doctor::create([
                    'specialist_id' => $spc->id,
                    'sip' => rand(100, 999) . '/' . strtoupper(substr($name6, 0, 3)) . '/' . rand(100, 999) . '/' . $faker->year(),
                    'name' => 'dr. '.$name6,
                    'image' => '6.jpg',
                ]);

                $name7 = $faker->name;
                Doctor::create([
                    'specialist_id' => $spc->id,
                    'sip' => rand(100, 999) . '/' . strtoupper(substr($name7, 0, 3)) . '/' . rand(100, 999) . '/' . $faker->year(),
                    'name' => 'dr. '.$name7,
                    'image' => '7.jpg',
                ]);

                $name8 = $faker->name;
                Doctor::create([
                    'specialist_id' => $spc->id,
                    'sip' => rand(100, 999) . '/' . strtoupper(substr($name8, 0, 3)) . '/' . rand(100, 999) . '/' . $faker->year(),
                    'name' => 'dr. '.$name8,
                    'image' => '8.jpg',
                ]);
            } else {
                $name = $faker->name;
                Doctor::create([
                    'specialist_id' => $spc->id,
                    'sip' => rand(100, 999) . '/' . strtoupper(substr($name, 0, 3)) . '/' . rand(100, 999) . '/' . $faker->year(),
                    'name' => 'dr. '.$name,
                    'image' => '1.jpg',
                ]);

                $name2 = $faker->name;
                Doctor::create([
                    'specialist_id' => $spc->id,
                    'sip' => rand(100, 999) . '/' . strtoupper(substr($name2, 0, 3)) . '/' . rand(100, 999) . '/' . $faker->year(),
                    'name' => 'dr. '.$name2,
                    'image' => '2.jpg',
                ]);

                $name3 = $faker->name;
                Doctor::create([
                    'specialist_id' => $spc->id,
                    'sip' => rand(100, 999) . '/' . strtoupper(substr($name3, 0, 3)) . '/' . rand(100, 999) . '/' . $faker->year(),
                    'name' => 'dr. '.$name3,
                    'image' => '3.jpg',
                ]);

                $name4 = $faker->name;
                Doctor::create([
                    'specialist_id' => $spc->id,
                    'sip' => rand(100, 999) . '/' . strtoupper(substr($name4, 0, 3)) . '/' . rand(100, 999) . '/' . $faker->year(),
                    'name' => 'dr. '.$name4,
                    'image' => '4.jpg',
                ]);

                $name5 = $faker->name;
                Doctor::create([
                    'specialist_id' => $spc->id,
                    'sip' => rand(100, 999) . '/' . strtoupper(substr($name5, 0, 3)) . '/' . rand(100, 999) . '/' . $faker->year(),
                    'name' => 'dr. '.$name5,
                    'image' => '5.jpg',
                ]);

                $name6 = $faker->name;
                Doctor::create([
                    'specialist_id' => $spc->id,
                    'sip' => rand(100, 999) . '/' . strtoupper(substr($name6, 0, 3)) . '/' . rand(100, 999) . '/' . $faker->year(),
                    'name' => 'dr. '.$name6,
                    'image' => '6.jpg',
                ]);

                $name7 = $faker->name;
                Doctor::create([
                    'specialist_id' => $spc->id,
                    'sip' => rand(100, 999) . '/' . strtoupper(substr($name7, 0, 3)) . '/' . rand(100, 999) . '/' . $faker->year(),
                    'name' => 'dr. '.$name7,
                    'image' => '7.jpg',
                ]);

                $name8 = $faker->name;
                Doctor::create([
                    'specialist_id' => $spc->id,
                    'sip' => rand(100, 999) . '/' . strtoupper(substr($name8, 0, 3)) . '/' . rand(100, 999) . '/' . $faker->year(),
                    'name' => 'dr. '.$name8,
                    'image' => '8.jpg',
                ]);

                $name9 = $faker->name;
                Doctor::create([
                    'specialist_id' => $spc->id,
                    'sip' => rand(100, 999) . '/' . strtoupper(substr($name9, 0, 3)) . '/' . rand(100, 999) . '/' . $faker->year(),
                    'name' => 'dr. '.$name9,
                    'image' => '9.jpg',
                ]);
            }
        }
    }
}

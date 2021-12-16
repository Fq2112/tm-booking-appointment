<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $user = User::create([
                'name' => $faker->firstName.' '.$faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('secret')
            ]);

            Customer::create([
                'user_id' => $user->id,
                'dob' => $faker->date,
                'gender' => rand(0,1) ? 'male' : 'female',
                'phone' => $faker->unique()->phoneNumber,
                'address' => $faker->address,
                'image' => rand(1,5).'.png',
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Doctor;
use App\Models\Order;
use App\Models\Product;
use App\Models\Schedule;
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
                'name' => $faker->firstName . ' ' . $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('secret')
            ]);

            $cust = Customer::create([
                'user_id' => $user->id,
                'dob' => $faker->date,
                'gender' => rand(0, 1) ? 'male' : 'female',
                'phone' => $faker->unique()->phoneNumber,
                'address' => $faker->address,
                'image' => rand(1, 5) . '.png',
            ]);

            Order::create([
                'uni_code' => strtoupper(uniqid('PYM') . now()->subDays(rand(1, 3))->timestamp),
                'customer_id' => $cust->id,
                'doctor_id' => rand(Doctor::min('id'), Doctor::max('id')),
                'schedule_id' => rand(Schedule::min('id'), Schedule::max('id')),
                'product_id' => rand(Product::min('id'), Product::max('id')),
                'total_price' => rand(300000, 500000),
                'date' => now()->format('Y-m-d'),
                'status' => 1,
                'snap_token' => $faker->bankAccountNumber,
            ]);

            Order::create([
                'uni_code' => strtoupper(uniqid('PYM') . now()->subDays(rand(1, 3))->timestamp),
                'customer_id' => $cust->id,
                'doctor_id' => rand(Doctor::min('id'), Doctor::max('id')),
                'schedule_id' => rand(Schedule::min('id'), Schedule::max('id')),
                'product_id' => rand(Product::min('id'), Product::max('id')),
                'total_price' => rand(300000, 500000),
                'date' => now()->subDay()->format('Y-m-d'),
                'status' => 2,
                'snap_token' => $faker->bankAccountNumber,
            ]);

            Order::create([
                'uni_code' => strtoupper(uniqid('PYM') . now()->subDays(rand(1, 3))->timestamp),
                'customer_id' => $cust->id,
                'doctor_id' => rand(Doctor::min('id'), Doctor::max('id')),
                'schedule_id' => rand(Schedule::min('id'), Schedule::max('id')),
                'product_id' => rand(Product::min('id'), Product::max('id')),
                'total_price' => rand(300000, 500000),
                'date' => now()->subMonth()->format('Y-m-d'),
                'status' => 3,
                'snap_token' => $faker->bankAccountNumber,
            ]);
        }
    }
}

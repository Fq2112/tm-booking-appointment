<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DaySeeder::class,
            SpecialistSeeder::class,
            ScheduleSeeder::class,
            DoctorSeeder::class,
            DoctorScheduleSeeder::class,
            ProductSeeder::class,
            TreatmentSeeder::class,
            UserSeeder::class,
        ]);
    }
}

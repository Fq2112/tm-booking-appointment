<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\DoctorSchedule;
use App\Models\Schedule;
use Illuminate\Database\Seeder;

class DoctorScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Schedule::all() as $sch) {
            DoctorSchedule::create([
                'doctor_id' => rand(Doctor::min('id'),Doctor::max('id')),
                'schedule_id' => $sch->id,
            ]);
        }
    }
}

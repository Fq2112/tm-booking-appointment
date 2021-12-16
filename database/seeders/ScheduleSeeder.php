<?php

namespace Database\Seeders;

use App\Models\Day;
use App\Models\Schedule;
use App\Models\Specialist;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Day::all() as $day) {
            $i = rand(4,6);
            foreach (Specialist::all() as $spc) {
                $start = new Carbon('0'.rand(7,9).':00:00');

                if($i == 4) {
                    Schedule::create([
                        'specialist_id' => $spc->id,
                        'day_id' => $day->id,
                        'start_time' => $start,
                        'end_time' => $start->addMinutes(30),
                    ]);

                    Schedule::create([
                        'specialist_id' => $spc->id,
                        'day_id' => $day->id,
                        'start_time' => $start->addMinutes(30),
                        'end_time' => $start->addMinutes(60),
                    ]);

                    Schedule::create([
                        'specialist_id' => $spc->id,
                        'day_id' => $day->id,
                        'start_time' => $start->addMinutes(60),
                        'end_time' => $start->addMinutes(90),
                    ]);

                    Schedule::create([
                        'specialist_id' => $spc->id,
                        'day_id' => $day->id,
                        'start_time' => $start->addMinutes(90),
                        'end_time' => $start->addMinutes(120),
                    ]);
                } elseif($i == 5) {
                    Schedule::create([
                        'specialist_id' => $spc->id,
                        'day_id' => $day->id,
                        'start_time' => $start,
                        'end_time' => $start->addMinutes(30),
                    ]);

                    Schedule::create([
                        'specialist_id' => $spc->id,
                        'day_id' => $day->id,
                        'start_time' => $start->addMinutes(30),
                        'end_time' => $start->addMinutes(60),
                    ]);

                    Schedule::create([
                        'specialist_id' => $spc->id,
                        'day_id' => $day->id,
                        'start_time' => $start->addMinutes(60),
                        'end_time' => $start->addMinutes(90),
                    ]);

                    Schedule::create([
                        'specialist_id' => $spc->id,
                        'day_id' => $day->id,
                        'start_time' => $start->addMinutes(90),
                        'end_time' => $start->addMinutes(120),
                    ]);

                    Schedule::create([
                        'specialist_id' => $spc->id,
                        'day_id' => $day->id,
                        'start_time' => $start->addMinutes(120),
                        'end_time' => $start->addMinutes(150),
                    ]);
                } else {
                    Schedule::create([
                        'specialist_id' => $spc->id,
                        'day_id' => $day->id,
                        'start_time' => $start,
                        'end_time' => $start->addMinutes(30),
                    ]);

                    Schedule::create([
                        'specialist_id' => $spc->id,
                        'day_id' => $day->id,
                        'start_time' => $start->addMinutes(30),
                        'end_time' => $start->addMinutes(60),
                    ]);

                    Schedule::create([
                        'specialist_id' => $spc->id,
                        'day_id' => $day->id,
                        'start_time' => $start->addMinutes(60),
                        'end_time' => $start->addMinutes(90),
                    ]);

                    Schedule::create([
                        'specialist_id' => $spc->id,
                        'day_id' => $day->id,
                        'start_time' => $start->addMinutes(90),
                        'end_time' => $start->addMinutes(120),
                    ]);

                    Schedule::create([
                        'specialist_id' => $spc->id,
                        'day_id' => $day->id,
                        'start_time' => $start->addMinutes(120),
                        'end_time' => $start->addMinutes(150),
                    ]);

                    Schedule::create([
                        'specialist_id' => $spc->id,
                        'day_id' => $day->id,
                        'start_time' => $start->addMinutes(150),
                        'end_time' => $start->addMinutes(180),
                    ]);
                }
            }
        }
    }
}

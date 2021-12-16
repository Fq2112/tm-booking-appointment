<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public function getSpecialist()
    {
        return $this->belongsTo(Specialist::class, 'specialist_id');
    }

    public function getDay()
    {
        return $this->belongsTo(Day::class, 'day_id');
    }

    public function getDoctorSchedule()
    {
        return $this->hasMany(DoctorSchedule::class,'schedule_id');
    }

    public function getOrder()
    {
        return $this->hasMany(Order::class,'schedule_id');
    }
}

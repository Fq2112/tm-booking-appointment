<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    use HasFactory;

    protected $table = 'doctor_schedules';

    protected $guarded = ['id'];

    public function getDoctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public function getSchedule()
    {
        return $this->belongsTo(Schedule::class,'schedule_id');
    }
}

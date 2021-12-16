<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public function getSpecialist()
    {
        return $this->belongsTo(Specialist::class, 'specialist_id');
    }

    public function getDoctorSchedule()
    {
        return $this->hasMany(DoctorSchedule::class,'doctor_id');
    }

    public function getOrder()
    {
        return $this->hasMany(Order::class,'doctor_id');
    }
}

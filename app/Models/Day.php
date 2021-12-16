<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    public function getSchedule()
    {
        return $this->hasMany(Schedule::class, 'day_id');
    }
}

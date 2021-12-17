<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    use HasFactory;

    protected $table = 'specialists';

    protected $guarded = ['id'];

    public function getSchedule()
    {
        return $this->hasMany(Schedule::class, 'specialist_id');
    }

    public function getDoctor()
    {
        return $this->hasMany(Doctor::class, 'specialist_id');
    }

    public function getProduct()
    {
        return $this->hasMany(Product::class, 'specialist_id');
    }
}

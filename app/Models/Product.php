<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $guarded = ['id'];

    public function getSpecialist()
    {
        return $this->belongsTo(Specialist::class, 'specialist_id');
    }

    public function getTreatment()
    {
        return $this->hasMany(Treatment::class, 'product_id');
    }

    public function getOrder()
    {
        return $this->hasMany(Order::class,'product_id');
    }
}

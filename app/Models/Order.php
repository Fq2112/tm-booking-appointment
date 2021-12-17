<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $guarded = ['id'];

    public function getCustomer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function getDoctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public function getSchedule()
    {
        return $this->belongsTo(Schedule::class,'schedule_id');
    }

    public function getProduct()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}

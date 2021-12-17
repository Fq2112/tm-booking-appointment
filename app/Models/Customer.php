<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $guarded = ['id'];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getOrder()
    {
        return $this->hasMany(Order::class,'customer_id');
    }
}

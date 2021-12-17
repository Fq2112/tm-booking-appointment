<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;

    protected $table = 'treatments';

    protected $guarded = ['id'];

    public function getProduct()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

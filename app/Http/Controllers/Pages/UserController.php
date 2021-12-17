<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function bookingList()
    {
        $user = Auth::user();
        $orders = Order::where('customer_id', $user->id)->orderByDesc('id')->get();

        return view('booking-list', compact('user','orders'));
    }
}

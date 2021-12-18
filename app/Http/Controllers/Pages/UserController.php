<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function bookingList(Request $request)
    {
        $user = Auth::user();
        $cust = $user->getCustomer;
        $orders = Order::where('customer_id', $cust->id)->orderBy('status')->get();

        return view('booking-list', compact('user','cust','orders'));
    }
}

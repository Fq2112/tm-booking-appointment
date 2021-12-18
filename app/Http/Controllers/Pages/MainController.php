<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Doctor;
use App\Models\Specialist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function home()
    {
        $specialists = Specialist::orderBy('name')->get();
        $doctors = Doctor::orderBy('name')->get()->take(16);

        return view('welcome', compact('specialists','doctors'));
    }

    public function bookingForm(Request $request)
    {
        $specialists = Specialist::orderBy('name')->get();
        $find_spc = null;
        $find_doc = null;
        $user = null;
        $find_cust = null;

        if($request->has('q')) {
            $find_spc = Specialist::where('permalink', $request->q)->first();
            if($request->has('id')) {
                $find_doc = Doctor::find(decrypt($request->id));
            }
        }

        if(Auth::check()) {
            $user = Auth::user();
            $find_cust = $user->getCustomer;
        }

        return view('booking-form', compact('specialists','find_spc','find_doc','user','find_cust'));
    }
}

<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Specialist;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        $specialists = Specialist::orderBy('name')->get();
        $doctors = Doctor::orderBy('name')->get()->take(16);

        return view('welcome', compact('specialists','doctors'));
    }

    public function findDoctor(Request $request)
    {
        // TODO doctors search page
    }

    public function bookingDoctor(Request $request)
    {
        // TODO form booking doctor
    }
}

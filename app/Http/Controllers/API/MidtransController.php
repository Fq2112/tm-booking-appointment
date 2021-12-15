<?php

namespace App\Http\Controllers\API;

use App\Helpers\Midtrans\SnapToken;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function snap()
    {
        // TODO snap
    }

    public function notificationCallback()
    {
        $notif = new Notification();
        try {
            // TODO payment
            return response()->json(200);

        } catch (\Exception $exception) {
            return response()->json($exception, 500);
        }
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Midtrans\Notification;
use Midtrans\Snap;
use Midtrans\Transaction;

class MidtransController extends Controller
{
    public function snap(Request $request)
    {
        $product = Product::find($request->product_id);

        return Snap::getSnapToken([
            'transaction_details' => [
                'order_id' => $request->uni_code,
                'gross_amount' => $request->total_price,
            ],
            'customer_details' => [
                'first_name' => array_shift($request->name),
                'last_name' => implode(" ", $request->name),
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
            ],
            'item_details' => [
                'id' => 'PRO-' . $request->code,
                'price' => ceil($product->price),
                'quantity' => 1,
                'name' => $product->name
            ]
        ]);
    }

    public function notificationCallback()
    {
        $notif = new Notification();
        $data_tr = collect(Transaction::status($notif->transaction_id))->toArray();
        $payment_cart = PaymentCart::where('uni_code_payment', $notif->order_id)->first();
        $input = ['rate_name' => $payment_cart->rate_name, 'rate_logo' => $payment_cart->rate_logo];
        $carts = Cart::whereIn('id', $payment_cart->cart_ids)->get();
        $user = User::find($payment_cart->user_id);
        $check = Order::where('uni_code', $request->uni_code)->first();
        if(!$check) {
            Order::firstOrCreate([
                'uni_code' => $request->uni_code,
                'customer_id' => $cust->id,
                'doctor_id' => $request->doctor_id,
                'schedule_id' => 1,
                'product_id' => $request->product_id,
                'total_price' => $request->total_price,
                'date' => $request->date,
                'status' => 1,
                'snap_token' => '#',
            ]);
        }

        try {
            if (!array_key_exists('fraud_status', $data_tr) ||
                (array_key_exists('fraud_status', $data_tr) && $data_tr['fraud_status'] == 'accept')) {

                if ($data_tr['transaction_status'] == 'pending') {
                    DB::beginTransaction();

                    foreach ($carts as $cart) {
                        $cart->update(['isCheckout' => true]);
                    }
                    $this->invoiceMail('unfinish', $notif->order_id, $user, null, $data_tr, $input);

                    DB::commit();
                    return __('lang.alert.checkout', ['qty' => count($carts), 's' => count($carts) > 1 ? 's' : '', 'code' => $notif->order_id]);

                } elseif ($data_tr['transaction_status'] == 'capture' || $data_tr['transaction_status'] == 'settlement') {
                    DB::beginTransaction();

                    foreach ($carts as $item) {
                        $item->update(['isCheckout' => true]);

                        $item_name = $item->subkategori_id != null ? $item->getSubKategori->getTranslation('name', 'en') : $item->getCluster->getTranslation('name', 'en');
                        $trim_name = explode(' ', trim($item_name));
                        $initial = '';
                        foreach ($trim_name as $key => $trimItem) {
                            $name = substr($trim_name[$key], 0, 1);
                            $initial = $initial . $name;
                        }

                        Order::create([
                            'payment_carts_id' => $payment_cart->id,
                            'progress_status' => StatusProgress::NEW,
                            'uni_code' => strtoupper(uniqid($initial)) . '-' . $item->id
                        ]);
                    }
                    $payment_cart->update(['finish_payment' => true]);
                    $this->invoiceMail('finish', $notif->order_id, $user, null, $data_tr, $input);

                    DB::commit();
                    return __('lang.alert.payment-success', [
                        'qty' => count($carts),
                        's' => count($carts) > 1 ? 's' : '',
                        'code' => $notif->order_id
                    ]);

                } elseif ($data_tr['transaction_status'] == 'expired') {
                    $payment_cart->delete();
                    $this->invoiceMail('expired', $notif->order_id, $user, null, $data_tr, $input);

                    return __('lang.alert.payment-expired', [
                        'qty' => count($carts),
                        's' => count($carts) > 1 ? 's' : '',
                        'code' => $notif->order_id
                    ]);
                }
            }

        } catch (\Exception $exception) {
            return response()->json($exception, 500);
        }
    }
}

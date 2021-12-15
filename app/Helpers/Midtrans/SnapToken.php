<?php

namespace App\Helpers\Midtrans;

use Midtrans\Snap;

class SnapToken extends MidtransConfig
{
    protected $order;

    public function __construct($order)
    {
        parent::__construct();

        $this->order = $order;
    }

    public function getSnapToken()
    {
        $params = [
            'transaction_details' => [
                'order_id' => $this->order->id,
                'gross_amount' => $this->order->total,
            ],
            'item_details' => $this->order->items,
            'customer_details' => $this->order->user
        ];

        return Snap::getSnapToken($params);
    }
}

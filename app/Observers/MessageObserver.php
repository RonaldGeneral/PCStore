<?php

 /**
  * @author Teh Chong Shin
  */

namespace App\Observers;

use App\Models\Order;
use Exception;
use Illuminate\Support\Facades\Http;

class MessageObserver
{
    private static $presetMessages = [
        -1 => 'Order #|OID| is cancelled.',
        1 => 'Order #|OID| is created.',
        2 => 'Driver assigned for Order #|OID|.',
        3 => 'Order #|OID| is out for delivery.',
        4 => 'Order #|OID| has reached the destination.',
    ];

    private function sendMessageFromApi($phone, $message)
    {
        $data = [
            'phone' => $phone,
            'message' => $message,
        ];

        return Http::post('http://localhost:5200/message/create', $data);
    }

    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        try {
                $res = $this->sendMessageFromApi(
                $order->customer->phone, 
                str_replace('|OID|', $order->id, MessageObserver::$presetMessages[$order->status])
            );
        } catch(Exception $e) {

        }
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        try {
            $res = $this->sendMessageFromApi(
                $order->customer->phone, 
                str_replace('|OID|', $order->id, MessageObserver::$presetMessages[$order->status])
            );
        } catch(Exception $e) {

        }
    }

}

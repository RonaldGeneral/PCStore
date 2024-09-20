<?php

namespace App\Observers;

use App\Models\Order;
use Error;
use Illuminate\Support\Facades\Http;


class EmailObserver
{
    private static $presetMessages = [
        -1 => 'Order #|OID| is cancelled.',
        1 => 'Order #|OID| is created.',
        2 => 'Driver assigned for Order #|OID|.',
        3 => 'Order #|OID| is out for delivery.',
        4 => 'Order #|OID| has reached the destination.',
    ];

    private function sendEmailFromApi($email, $subject, $message)
    {
        $data = [
            'receiver' => $email,
            'subject' => $subject,
            'message' => $message,
        ];

        return Http::post('http://localhost:5002/api/emailservice/send', $data);
    }
    
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        try {
            $res = $this->sendEmailFromApi(
            $order->customer->email, 
            "Order created", 
            str_replace('|OID|', $order->id, EmailObserver::$presetMessages[$order->status])
            );
        } catch(Error $e) {

        }
        
    }

    /**
     * Handle the Order "updated" event.
     */
    // public function updated(Order $order): void
    // {
    //     try {
    //         $res = $this->sendEmailFromApi(
    //         $order->customer->email, 
    //         "Order status update", 
    //         str_replace('|OID|', $order->id, EmailObserver::$presetMessages[$order->status])
    //         );
    //     } catch(Error $e) {

    //     }
    // }

}

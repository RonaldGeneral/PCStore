<?php

 /**
  * @author Teh Chong Shin
  */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /*
    
        Status: 
            -1 = Deleted
            1 = Order created
            2 = Driver assigned
            3 = Ongoing
            4 = Completed
    
    */
    use HasFactory;

    protected $table = 'order';
    public $timestamps = false;

    protected $fillable = [
        'subtotal',
        'total',
        'delivery_fee',
        'status',
        'customer_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}

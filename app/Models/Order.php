<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'cart_item';
    public $timestamps = false;

    protected $fillable = [
        'customer_id',	
        'product_id',	
        'quantity',	
        'price',	
        'subtotal'
    ];
}

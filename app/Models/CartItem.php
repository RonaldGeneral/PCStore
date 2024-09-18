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

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('customer_id', '=', $this->getAttribute('customer_id'))
            ->where('product_id', '=', $this->getAttribute('product_id'));

        return $query;
    }
}

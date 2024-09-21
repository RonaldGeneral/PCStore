<?php

 /**
  * @author Teh Chong Shin
  */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payment';
    public $timestamps = false;

    protected $fillable = [
        'payment_method', 'fpx_bank_name',
        'card_number','tng_number',
        'token','status'
    ];
}

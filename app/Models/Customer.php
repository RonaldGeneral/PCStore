<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = [
        "name",
        "birthdate",
        "phone",
        "email",
        "gender",
        "address",
        "postcode",
        "city",
        "state",
        "username",
        "password",
        "status",
        "created_on",
    ];

    public $timestamps = false;
    protected $hidden = ['password'];
}

<?php

/**
  * @author Christopher Wong Jia He
  */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admin';

    protected $fillable = [
        "name",
        "birthdate",
        "phone",
        "email",
        "gender",
        "username",
        "password",
        "status",
        "created_on",
        "position_id",
    ];

    public $timestamps = false;
    protected $hidden = ['password'];

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }
}

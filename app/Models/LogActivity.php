<?php

/**
  * @author Christopher Wong Jia He
  */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    use HasFactory;

    protected $table = 'log_activity';

    protected $fillable = [
        "id",
        "title",
        "description",
        "page",
        "admin_id",

    ];

    public $timestamps = false;

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}

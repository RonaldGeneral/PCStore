<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'title',
        'description',
        'price',
        'status',
        'category',
    ];

    public $timestamps = false;

    public function getTotalRatingAttribute($value)
    {
        $full_star = intval($value);
        $ratings = array_fill(0, $full_star, 'f');

        if($value - $full_star > 0)
            array_push($ratings,'h');

        $ratings = array_merge($ratings, array_fill(0, (5 - count($ratings)), 'e'));

        return [
            'original'=> $value,
            'formatted'=> $ratings
        ];
    }

    // public function attributes()
    // {
    //     return $this->hasMany('App\Models\ProductAttribute');
    // }
}





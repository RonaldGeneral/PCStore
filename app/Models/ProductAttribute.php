<?php

 /**
  * @author Teh Chong Shin
  */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $table = 'product_attribute';
    public $timestamps = false;

    protected $fillable = [
        'product_id',	
        'attribute_id',	
        'value'
    ];	

    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('product_id', '=', $this->getAttribute('product_id'))
            ->where('attribute_id', '=', $this->getAttribute('attribute_id'));

        return $query;
    }

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_attribute extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'product_price',
        'product_quantity'
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
}

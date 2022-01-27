<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_code',
        'product_description',
        'product_status',
        'category_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function product_images(){
        return $this->hasMany(Product_image::class);
    }
    public function product_attributes(){
        return $this->hasMany(Product_attribute::class);
    }
}

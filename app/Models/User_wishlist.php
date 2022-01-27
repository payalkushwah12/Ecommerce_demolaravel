<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_wishlist extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_code',
        'product_price',
        'product_image',
        'product_id',
        'user_email'
    ];
}

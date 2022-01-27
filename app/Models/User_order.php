<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_email',
        'product_id',
        'product_name',
        'product_image',
        'order_status',
        'product_quantity',
        'product_price',
	    'coupon_used',
	    'coupon_discount',
        'total_amount',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_email',
        'order_id',
	    'user_order_id',
        'product_id',
        'payment_method',
        'order_status',
    ];
}

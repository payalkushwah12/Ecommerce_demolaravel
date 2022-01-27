<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_address extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'user_email',
        'postal',
        'contact',
        'address',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponCards extends Model
{
    use HasFactory;
    protected $table = "coupon_cards";

    protected $fillable = [
        'coupon_code',
        'coupon_price',
        'created_at',
        'updated_at'        
    ];
}
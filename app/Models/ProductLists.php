<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLists extends Model
{
    use HasFactory;
    protected $table = "products_item";

    protected $fillable = [
        'lang_format',
        'category_id',
        'sec_category_id',
        'thi_category_id',
        'has_promotion',
        'has_discount',
        'product_name',
        'product_desc',
        'product_avatar',
        'product_price',
        'created_at',
        'updated_at'        
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductItemImage extends Model
{
    use HasFactory;
    protected $table = "product_item_image";

    protected $fillable = [
        'product_item_id',
        'product_image_path'      
    ];
}

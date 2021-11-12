<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkCategories extends Model
{
    use HasFactory;
    protected $table = "categories";

    protected $fillable = [
        'category_name_en',
        'category_name_mm',
        'category_name_ch',
        'category_des_en',
        'category_des_mm',
        'category_des_ch',
        'category_avator',
        'created_at',
        'updated_at'        
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondCategory extends Model
{
    use HasFactory;
    protected $table = "sec_category";

    protected $fillable = [
        'lang_format',
        'category_id',
        'sec_category_name',
        'created_at',
        'updated_at'
    ];
}

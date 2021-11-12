<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThirdCategory extends Model
{
    use HasFactory;
    protected $table = "third_category";
    public $timestamps = false;
    protected $fillable = [
        'lang_format',
        'category_id',
        'sec_category_id',
        'third_category_name',
        'created_at',
        'updated_at'
    ];
}

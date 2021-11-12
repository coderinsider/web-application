<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkBanner extends Model
{
    use HasFactory;
    protected $table = "mark_banner_ad";

    protected $fillable = [
        'banner_images',
        'banner_links',
        'banner_content'
        'created_at',
        'updated_at'        
    ];
}

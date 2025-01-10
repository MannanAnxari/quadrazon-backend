<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoMeta extends Model
{
    use HasFactory;

    protected $table = 'seo_metas';  
    
    protected $fillable = [
        'meta_title',
        'meta_description',
        'meta_keywords',
        'route',
        'title',
        'description',
        'keywords',
    ];

    // Optional: Add any custom casts or attributes if needed
    // protected $casts = [
    //     'created_at' => 'datetime',
    //     'updated_at' => 'datetime',
    // ];

    // Optional: You can define relationships, scopes, etc., if applicable
}

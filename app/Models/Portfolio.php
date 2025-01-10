<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = ['title', 'description', 'image', 'category_id', 'tags'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
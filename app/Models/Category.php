<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'context'];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }
}
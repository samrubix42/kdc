<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'description',
        'slug',
        'content',
        'tags',
        'category_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'image',
        'is_active'
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }
}

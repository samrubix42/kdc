<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'project_type',
        'slug',
        'description',
        'clients',
        'completion_date',
        'architects',
    ];

    protected $casts = [
        'completion_date' => 'date',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProjectCategory::class, 'project_type');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class);
    }
}

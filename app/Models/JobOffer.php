<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    public function applications(): HasMany
{
    return $this->hasMany(Application::class);
}
    protected $fillable = [
        'title',
        'reference',
        'sector',
        'location',
        'contract_type',
        'short_description',
        'description',
        'profile',
        'requirements',
        'published_at',
        'deadline',
        'is_published',
    ];

    protected $casts = [
        'published_at' => 'date',
        'deadline' => 'date',
        'is_published' => 'boolean',
    ];
}
<?php

namespace App\Models;

use App\Traits\ClearsCacheOnSave;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    use HasFactory, ClearsCacheOnSave;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'is_published',
        'parent_id',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Page::class, 'parent_id');
    }
}

<?php

// app/Models/Service.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'parent_id',
        'is_published',
        'order',
    ];

    // Родительская услуга
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    // Дочерние услуги
    public function children(): HasMany
    {
        return $this->hasMany(Service::class, 'parent_id');
    }

    // Вложенные дочерние (рекурсивно)
    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    // Только опубликованные дочерние
    public function publishedChildren()
    {
        return $this->children()->where('is_published', true);
    }

    // Родительская категория (если есть)
    public function parentService()
    {
        return $this->parent()->where('is_published', true);
    }

    // URL услуги
    public function getUrlAttribute(): string
    {
        if ($this->parent) {
            return "/services/{$this->parent->slug}/{$this->slug}";
        }
        return "/services/{$this->slug}";
    }
}

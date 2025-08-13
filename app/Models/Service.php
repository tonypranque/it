<?php

namespace App\Models;

use App\Traits\ClearsCacheOnSave;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Service extends Model
{
    use ClearsCacheOnSave;
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'icon',
        'parent_id',
        'is_published',
        'order'
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (Service $service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->title);
            }
        });
    }

    // Отношение к родительской услуге
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'parent_id');
    }

    // Отношение к дочерним услугам
    public function children(): HasMany
    {
        return $this->hasMany(Service::class, 'parent_id');
    }

    // Опубликованные дочерние услуги
    public function publishedChildren(): HasMany
    {
        return $this->children()->where('is_published', true)->orderBy('order');
    }

    // Scope для опубликованных услуг
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    // Scope для корневых услуг
    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id');
    }

    // Получить корневые опубликованные услуги
    public static function getRootPublished($limit = null)
    {
        $query = self::root()->published()->orderBy('order');

        if ($limit) {
            $query->limit($limit);
        }

        return $query->get();
    }

    // Получить URL услуги
    public function getUrlAttribute(): string
    {
        if ($this->parent_id) {
            return route('services.show.child', [$this->parent->slug, $this->slug]);
        }

        return route('services.show.parent', $this->slug);
    }

    // Получить SEO описание
    public function getSeoDescriptionAttribute(): string
    {
        return $this->excerpt ?? Str::limit(strip_tags($this->content ?? ''), 160);
    }
}

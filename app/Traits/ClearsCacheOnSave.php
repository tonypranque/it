<?php

namespace App\Traits;

use App\Jobs\ClearAppCache;

trait ClearsCacheOnSave
{
    protected static function booted(): void
    {
        static::saved(function ($model) {
            ClearAppCache::dispatch();
        });

        static::deleted(function ($model) {
            ClearAppCache::dispatch();
        });
    }
}

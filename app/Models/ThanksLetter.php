<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ThanksLetter extends Model
{
    protected $fillable = ['title', 'image'];

    // Аксессоры
    protected $appends = ['thumbnail', 'full_image'];

    public function getThumbnailAttribute(): string
    {
        return Storage::disk('public')->url($this->getThumbnailPath());
    }

    public function getFullImageAttribute(): string
    {
        return Storage::disk('public')->url($this->image);
    }

    public function getThumbnailPath(): string
    {
        if (!$this->image) return '';

        $pathInfo = pathinfo($this->image);
        $thumbnailName = $pathInfo['filename'] . '_thumb.' . $pathInfo['extension'];
        return $pathInfo['dirname'] . '/' . $thumbnailName;
    }
}

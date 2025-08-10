<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class ThanksLetter extends Model
{
    protected $fillable = [
        'title',
        'image',
    ];

    protected static function booted()
    {
        // После создания записи
        static::created(function ($model) {
            $model->generateThumbnail();
        });

        // После обновления записи
        static::updated(function ($model) {
            if ($model->wasChanged('image')) {
                $model->generateThumbnail();
            }
        });

        // При удалении
        static::deleted(function ($model) {
            // Удаляем основное изображение
            if ($model->image && Storage::exists($model->image)) {
                Storage::delete($model->image);
            }

            // Удаляем миниатюру
            $thumbnailPath = $model->getThumbnailPath();
            if (Storage::exists($thumbnailPath)) {
                Storage::delete($thumbnailPath);
            }
        });
    }

    public function generateThumbnail()
    {
        if (!$this->image) return;

        $originalPath = Storage::path($this->image);

        // Проверяем существование оригинального файла
        if (!file_exists($originalPath)) {
            return;
        }

        $thumbnailPath = Storage::path($this->getThumbnailPath());

        // Создаем директорию если её нет
        $thumbnailDir = dirname($thumbnailPath);
        if (!file_exists($thumbnailDir)) {
            mkdir($thumbnailDir, 0755, true);
        }

        try {
            // Создаем миниатюру с правильными пропорциями для A4 (вертикальная ориентация)
            $manager = new ImageManager(new GdDriver());
            $image = $manager->read($originalPath);

            // Для предпросмотра используем cover с размерами 300x400 (портретная ориентация)
            $image->coverDown(300, 400);

            // Сохраняем миниатюру
            $image->save($thumbnailPath);
        } catch (\Exception $e) {
            \Log::error('Failed to generate thumbnail: ' . $e->getMessage());
        }
    }

    public function getThumbnailPath(): string
    {
        $pathInfo = pathinfo($this->image);
        $thumbnailName = $pathInfo['filename'] . '_thumb.' . $pathInfo['extension'];
        return $pathInfo['dirname'] . '/' . $thumbnailName;
    }

    // Аксессоры
    public function getThumbnailAttribute(): string
    {
        return Storage::url($this->getThumbnailPath());
    }

    public function getFullImageAttribute(): string
    {
        return Storage::url($this->image);
    }
}

<?php
// app/Observers/ThanksLetterObserver.php

namespace App\Observers;

use App\Models\ThanksLetter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class ThanksLetterObserver
{
    public function created(ThanksLetter $thanksLetter): void
    {
        if ($thanksLetter->image) {
            $this->generateThumbnail($thanksLetter);
        }
    }

    public function updated(ThanksLetter $thanksLetter): void
    {
        if ($thanksLetter->wasChanged('image')) {
            // Удаляем старую миниатюру, если была
            $oldThumbnail = $this->getThumbnailPath($thanksLetter->getOriginal('image'));
            if ($oldThumbnail && Storage::disk('public')->exists($oldThumbnail)) {
                Storage::disk('public')->delete($oldThumbnail);
            }

            // Генерируем новую
            $this->generateThumbnail($thanksLetter);
        }
    }

    public function deleted(ThanksLetter $thanksLetter): void
    {
        $image = $thanksLetter->image;
        $thumbnail = $this->getThumbnailPath($image);

        if ($image && Storage::disk('public')->exists($image)) {
            Storage::disk('public')->delete($image);
        }

        if ($thumbnail && Storage::disk('public')->exists($thumbnail)) {
            Storage::disk('public')->delete($thumbnail);
        }
    }

    protected function generateThumbnail(ThanksLetter $thanksLetter): void
    {
        $image = $thanksLetter->image;
        if (!$image) return;

        $disk = 'public';
        $originalPath = Storage::disk($disk)->path($image);

        if (!file_exists($originalPath)) {
            Log::warning("Original image not found for thumbnail generation: {$image}");
            return;
        }

        $thumbnailPath = $this->getThumbnailPath($image);
        $fullThumbnailPath = Storage::disk($disk)->path($thumbnailPath);

        $dir = dirname($fullThumbnailPath);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        try {
            $manager = new ImageManager(new GdDriver());
            $imageObj = $manager->read($originalPath);
            $imageObj->coverDown(300, 400); // портрет 3:4
            $imageObj->save($fullThumbnailPath);

            Log::info("Thumbnail generated: {$thumbnailPath}");
        } catch (\Exception $e) {
            Log::error("Failed to generate thumbnail for {$image}: " . $e->getMessage());
        }
    }

    protected function getThumbnailPath(?string $image): ?string
    {
        if (!$image) return null;

        $pathInfo = pathinfo($image);
        $thumbnailName = $pathInfo['filename'] . '_thumb.' . $pathInfo['extension'];
        return $pathInfo['dirname'] . '/' . $thumbnailName;
    }
}

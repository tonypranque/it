<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'photo_path',
        'social_links',
    ];

    protected $casts = [
        'social_links' => 'array',
    ];

    // Аксессор для получения URL изображения
    public function getPhotoUrlAttribute()
    {
        if ($this->photo_path) {
            // Если это уже полный URL
            if (filter_var($this->photo_path, FILTER_VALIDATE_URL)) {
                return $this->photo_path;
            }

            // Используем Storage для генерации правильного URL
            return Storage::disk('public')->url($this->photo_path);
        }

        // Возвращаем путь к заглушке, если фото нет
        return asset('img/team/default.jpg');
    }
}

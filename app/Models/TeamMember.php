<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

// app/Models/TeamMember.php

use Illuminate\Support\Facades\Artisan;

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
            if (filter_var($this->photo_path, FILTER_VALIDATE_URL)) {
                return $this->photo_path;
            }

            return Storage::disk('public')->url($this->photo_path);
        }

        return asset('img/team/default.jpg');
    }

    // 🔁 Сброс кеша при изменении модели
    protected static function booted()
    {
        static::saved(function ($model) {
            static::clearLaravelCache();
        });

        static::deleted(function ($model) {
            static::clearLaravelCache();
        });
    }

    // 🧹 Метод для очистки кеша
    public static function clearLaravelCache()
    {
        // Выполняем асинхронно через queue, чтобы не тормозить запрос
        dispatch(function () {
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('route:clear');
            Artisan::call('view:clear');
        })->afterResponse(); // Выполняется после ответа пользователю
    }
}

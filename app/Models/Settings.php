<?php

namespace App\Models;

use App\Traits\ClearsCacheOnSave;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use ClearsCacheOnSave;
    protected $fillable = [
        'phone',
        'email',
        'address',
        'tg_username',
        'vk_username',
    ];
}

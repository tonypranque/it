<?php

use App\Models\Settings;

if (!function_exists('site_setting')) {
    /**
     * Получить значение настройки сайта.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function site_setting($key, $default = null)
    {
        $setting = \Cache::rememberForever('site_settings', function () {
            return \App\Models\Settings::first() ?? new \stdClass();
        });

        return $setting->{$key} ?? $default;
    }
}

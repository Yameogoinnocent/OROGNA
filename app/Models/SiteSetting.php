<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = ['key', 'value', 'type'];

    public static function value(string $key, mixed $default = null): mixed
    {
        return Cache::remember('site_setting_' . $key, 86400, function () use ($key, $default) {
            return static::where('key', $key)->value('value') ?? $default;
        });
    }

    public static function clearCache(string $key): void
    {
        Cache::forget('site_setting_' . $key);
    }
}

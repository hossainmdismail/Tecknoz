<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketingSettings extends Model
{
    public const SETTINGS_ID = 1;

    public static function currentOrCreate(): self
    {
        return self::unguarded(fn (): self => self::query()->firstOrCreate(['id' => self::SETTINGS_ID]));
    }

    protected $fillable = [
        'gtm_enabled',
        'gtm_container_id',
        'ga4_enabled',
        'ga4_measurement_id',
        'meta_pixel_enabled',
        'meta_pixel_id',
        'tiktok_pixel_enabled',
        'tiktok_pixel_id',
        'google_search_console_verification',
        'bing_webmaster_verification',
        'meta_domain_verification',
        'custom_head_scripts',
        'custom_body_start_scripts',
        'custom_body_end_scripts',
    ];

    protected $casts = [
        'gtm_enabled' => 'boolean',
        'ga4_enabled' => 'boolean',
        'meta_pixel_enabled' => 'boolean',
        'tiktok_pixel_enabled' => 'boolean',
    ];
}

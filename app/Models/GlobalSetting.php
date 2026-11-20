<?php

namespace App\Models;

use App\Enums\ContactChannel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class GlobalSetting extends Model
{
    public const SETTINGS_ID = 1;

    public static function currentOrCreate(): self
    {
        return self::unguarded(fn (): self => self::query()->firstOrCreate(
            ['id' => self::SETTINGS_ID],
            [
                'site_name' => config('app.name'),
                'contact_locations' => config('contact.locations'),
                'contact_channels' => config('contact.channels'),
                'business_hours' => config('contact.business_hours'),
            ],
        ));
    }

    protected $fillable = [
        'site_name',
        'site_tagline',
        'company_short_description',
        'logo_path',
        'favicon_path',

        'contact_locations',
        'contact_channels',
        'business_hours',

        'facebook_url',
        'linkedin_url',
        'twitter_url',
        'youtube_url',
        'instagram_url',

        'footer_text',
        'copyright_text',

        'default_meta_title',
        'default_meta_description',
        'default_og_title',
        'default_og_description',
        'default_og_image_path',
        'canonical_base_url',
        'default_robots_meta',
    ];

    protected function casts(): array
    {
        return [
            'contact_locations' => 'array',
            'contact_channels' => 'array',
        ];
    }

    public function contactLinks(): Collection
    {
        return collect($this->contact_channels)->map(function (array $entry): array {
            $channel = ContactChannel::from($entry['type']);

            return [
                'type' => $channel->value,
                'label' => $entry['label'] ?? $channel->label(),
                'value' => $entry['value'],
                'href' => $channel->href($entry),
            ];
        });
    }

    public function getLogoUrlAttribute(): ?string
    {
        return $this->logo_path ? Storage::disk('public')->url($this->logo_path) : null;
    }

    public function getFaviconUrlAttribute(): ?string
    {
        return $this->favicon_path ? Storage::disk('public')->url($this->favicon_path) : null;
    }

    public function getDefaultOgImageUrlAttribute(): ?string
    {
        return $this->default_og_image_path ? Storage::disk('public')->url($this->default_og_image_path) : null;
    }
}

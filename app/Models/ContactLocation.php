<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ContactLocation extends Model
{
    protected $fillable = [
        'label',
        'office_name',
        'address',
        'map_url',
        'map_embed_code',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return ['is_active' => 'boolean', 'sort_order' => 'integer'];
    }

    public function scopeVisible(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('sort_order')->orderBy('id');
    }

    public function hasOfficeDetails(): bool
    {
        return filled($this->address) || filled($this->office_name);
    }

    public function mapLink(): ?string
    {
        return Str::startsWith((string) $this->map_url, ['http://', 'https://']) ? $this->map_url : null;
    }

    public function directionsLink(): ?string
    {
        return $this->mapLink() ?? (filled($this->address)
            ? 'https://www.google.com/maps/search/?api=1&query='.rawurlencode(Str::squish($this->address))
            : null);
    }
}

<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasPublication
{
    #[Scope]
    protected function published(Builder $query): void
    {
        $query->whereNotNull('published_at');
    }

    protected function isPublished(): Attribute
    {
        return Attribute::make(
            get: fn (): bool => $this->published_at !== null,
            set: fn (bool $published): array => [
                'published_at' => $published ? ($this->published_at ?? now()) : null,
            ],
        );
    }
}

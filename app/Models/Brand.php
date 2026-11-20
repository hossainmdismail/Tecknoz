<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Brand extends Model
{
    protected $fillable = ['image', 'is_active'];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }

    #[Scope]
    protected function active(Builder $query): void
    {
        $query->where('is_active', true);
    }

    protected static function booted(): void
    {
        static::updated(function (Brand $brand): void {
            if ($brand->wasChanged('image')) {
                $brand->removeImageAfterCommit($brand->getOriginal('image'));
            }
        });

        static::deleted(fn (Brand $brand) => $brand->removeImageAfterCommit($brand->image));
    }

    public function getImageUrlAttribute(): string
    {
        return Storage::disk('public')->url($this->image);
    }

    private function removeImageAfterCommit(string $path): void
    {
        if (! str_starts_with($path, 'brands/')) {
            return;
        }

        $this->getConnection()->afterCommit(function () use ($path): void {
            if ($this->newQuery()->where('image', $path)->doesntExist()) {
                Storage::disk('public')->delete($path);
            }
        });
    }
}

<?php

namespace App\Models;

use App\Models\Concerns\HasPublication;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class BlogPost extends Model
{
    use HasPublication;

    protected $fillable = [
        'title',
        'slug',
        'blog_category_id',
        'summary',
        'body',
        'image',
        'thumbnail',
        'read_time',
        'is_featured',
        'is_published',
    ];

    protected static function booted(): void
    {
        static::updated(function (BlogPost $post): void {
            foreach (['image', 'thumbnail'] as $field) {
                if ($post->wasChanged($field)) {
                    $post->removeUploadAfterCommit($post->getOriginal($field));
                }
            }
        });

        static::deleted(function (BlogPost $post): void {
            foreach (array_unique([$post->image, $post->thumbnail]) as $path) {
                $post->removeUploadAfterCommit($path);
            }
        });
    }

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'read_time' => 'integer',
            'published_at' => 'datetime',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::get(fn (): ?string => $this->image ? Storage::disk('public')->url($this->image) : null);
    }

    protected function thumbnailUrl(): Attribute
    {
        return Attribute::get(fn (): ?string => $this->thumbnail
            ? Storage::disk('public')->url($this->thumbnail)
            : $this->image_url);
    }

    private function removeUploadAfterCommit(?string $path): void
    {
        if (! $path || ! str_starts_with($path, 'blogs/images/')) {
            return;
        }

        $this->getConnection()->afterCommit(function () use ($path): void {
            if ($this->newQuery()->where('image', $path)->orWhere('thumbnail', $path)->doesntExist()) {
                Storage::disk('public')->delete($path);
            }
        });
    }
}

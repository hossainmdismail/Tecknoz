<?php

namespace App\Models;

use App\Models\Concerns\HasPublication;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasPublication;

    protected $fillable = [
        'name',
        'slug',
        'summary',
        'details',
        'image',
        'client',
        'client_logo',
        'services_rendered',
        'is_featured',
        'color',
        'deadline',
        'industry',
        'is_published',
    ];

    protected static function booted(): void
    {
        static::updated(function (Project $project): void {
            foreach (['image', 'client_logo'] as $attribute) {
                if ($project->wasChanged($attribute)) {
                    $project->removeUploadAfterCommit($project->getOriginal($attribute));
                }
            }
        });

        static::deleted(function (Project $project): void {
            $project->removeUploadAfterCommit($project->image);
            $project->removeUploadAfterCommit($project->client_logo);
        });
    }

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'deadline' => 'date',
            'published_at' => 'datetime',
        ];
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::get(fn (): ?string => $this->image ? Storage::disk('public')->url($this->image) : null);
    }

    protected function clientLogoUrl(): Attribute
    {
        return Attribute::get(fn (): ?string => $this->client_logo ? Storage::disk('public')->url($this->client_logo) : null);
    }

    private function removeUploadAfterCommit(?string $path): void
    {
        if (! $path || ! Str::startsWith($path, ['projects/images/', 'projects/logos/'])) {
            return;
        }

        $this->getConnection()->afterCommit(function () use ($path): void {
            if ($this->newQuery()->where('image', $path)->orWhere('client_logo', $path)->doesntExist()) {
                Storage::disk('public')->delete($path);
            }
        });
    }
}

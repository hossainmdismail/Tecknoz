<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\SeoPages\SeoPagesResource;
use App\Models\SeoPages;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ContentCollectionsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected static bool $isLazy = false;

    protected ?string $heading = 'Content Overview';

    protected ?string $description = 'Active and total SEO entries.';

    protected function getStats(): array
    {
        return [
            Stat::make('SEO Pages', SeoPages::query()->count())
                ->description(SeoPages::query()->where('is_active', true)->count().' active')
                ->icon(Heroicon::OutlinedDocumentMagnifyingGlass)
                ->color('danger')
                ->url(SeoPagesResource::getUrl()),

        ];
    }
}

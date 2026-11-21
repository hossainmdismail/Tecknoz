<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\BlogPosts\BlogPostResource;
use App\Filament\Resources\Brands\BrandResource;
use App\Filament\Resources\ContactLocations\ContactLocationResource;
use App\Filament\Resources\Events\EventResource;
use App\Filament\Resources\Faqs\FaqResource;
use App\Filament\Resources\Projects\ProjectResource;
use App\Filament\Resources\SeoPages\SeoPagesResource;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Brand;
use App\Models\ContactLocation;
use App\Models\Event;
use App\Models\Faq;
use App\Models\Project;
use App\Models\SeoPages;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ContentCollectionsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected static bool $isLazy = false;

    protected ?string $pollingInterval = '60s';

    protected ?string $heading = 'Content Overview';

    protected function getStats(): array
    {
        return [
            Stat::make('Projects', Project::query()->count())
                ->description(number_format(Project::query()->published()->count()).' published')
                ->icon(Heroicon::OutlinedBriefcase)
                ->url(ProjectResource::getUrl()),
            Stat::make('Blog Posts', BlogPost::query()->count())
                ->description(number_format(BlogPost::query()->published()->count()).' published · '
                    .number_format(BlogCategory::query()->count()).' categories')
                ->icon(Heroicon::OutlinedNewspaper)
                ->url(BlogPostResource::getUrl()),
            Stat::make('Brands', Brand::query()->count())
                ->description(number_format(Brand::query()->active()->count()).' enabled')
                ->icon(Heroicon::OutlinedSwatch)
                ->url(BrandResource::getUrl()),
            Stat::make('FAQs', Faq::query()->count())
                ->description(number_format(Faq::query()->where('is_active', true)->count()).' enabled')
                ->icon(Heroicon::OutlinedQuestionMarkCircle)
                ->url(FaqResource::getUrl()),
            Stat::make('Contact Locations', ContactLocation::query()->count())
                ->description(number_format(ContactLocation::query()->where('is_active', true)->count()).' enabled')
                ->icon(Heroicon::OutlinedMapPin)
                ->url(ContactLocationResource::getUrl()),
            Stat::make('Events', Event::query()->count())
                ->description(number_format(Event::query()->active()->count()).' published')
                ->icon(Heroicon::OutlinedCalendarDays)
                ->url(EventResource::getUrl()),
            Stat::make('SEO Pages', SeoPages::query()->count())
                ->description(number_format(SeoPages::query()->where('is_active', true)->count()).' active')
                ->icon(Heroicon::OutlinedDocumentMagnifyingGlass)
                ->url(SeoPagesResource::getUrl()),
        ];
    }
}

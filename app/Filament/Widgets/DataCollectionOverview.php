<?php

namespace App\Filament\Widgets;

use App\Enums\ContactSubmissionStatus;
use App\Filament\Resources\ContactSubmissions\ContactSubmissionResource;
use App\Filament\Resources\NewsletterSubscriptions\NewsletterSubscriptionResource;
use App\Models\ContactSubmission;
use App\Models\NewsletterSubscription;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DataCollectionOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 0;

    protected static bool $isLazy = false;

    protected ?string $pollingInterval = '60s';

    protected ?string $heading = 'Data Collection';

    protected int|array|null $columns = ['@xl' => 2];

    protected function getStats(): array
    {
        $newInquiries = ContactSubmission::query()->where('status', ContactSubmissionStatus::New)->count();
        $inProgress = ContactSubmission::query()->where('status', ContactSubmissionStatus::InProgress)->count();
        $recentSubscribers = NewsletterSubscription::query()->where('created_at', '>=', now()->subDays(30))->count();

        return [
            Stat::make('Contact Submissions', ContactSubmission::query()->count())
                ->description(number_format($newInquiries).' new · '.number_format($inProgress).' in progress')
                ->icon(Heroicon::OutlinedInbox)
                ->url(ContactSubmissionResource::getUrl()),
            Stat::make('Newsletter Subscriptions', NewsletterSubscription::query()->count())
                ->description(number_format($recentSubscribers).' in the last 30 days')
                ->icon(Heroicon::OutlinedEnvelope)
                ->url(NewsletterSubscriptionResource::getUrl()),
        ];
    }
}

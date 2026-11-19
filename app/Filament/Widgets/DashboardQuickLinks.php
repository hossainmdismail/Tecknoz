<?php

namespace App\Filament\Widgets;

use App\Filament\Pages\GlobalSettings;
use App\Filament\Pages\MarketingSettings;
use App\Filament\Resources\SeoPages\SeoPagesResource;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DashboardQuickLinks extends Widget
{
    protected static ?int $sort = 2;

    protected static bool $isLazy = false;

    protected int|string|array $columnSpan = 'full';

    protected string $view = 'filament.widgets.dashboard-quick-links';

    public function revokeSession(string $sessionId): void
    {
        if (! $this->supportsDatabaseSessions() || ! filament()->auth()->check()) {
            return;
        }

        if ($sessionId === session()->getId()) {
            Notification::make()
                ->warning()
                ->title('Current session cannot be logged out from here.')
                ->send();

            return;
        }

        DB::connection(config('session.connection'))->table(config('session.table', 'sessions'))
            ->where('id', $sessionId)
            ->where('user_id', filament()->auth()->id())
            ->delete();

        filament()->auth()->user()?->forceFill([
            'remember_token' => Str::random(60),
        ])->save();

        Notification::make()
            ->success()
            ->title('Session logged out successfully.')
            ->send();
    }

    public function revokeOtherSessions(): void
    {
        if (! $this->supportsDatabaseSessions() || ! filament()->auth()->check()) {
            return;
        }

        DB::connection(config('session.connection'))->table(config('session.table', 'sessions'))
            ->where('user_id', filament()->auth()->id())
            ->where('id', '!=', session()->getId())
            ->delete();

        filament()->auth()->user()?->forceFill([
            'remember_token' => Str::random(60),
        ])->save();

        Notification::make()
            ->success()
            ->title('All other sessions have been logged out.')
            ->send();
    }

    protected function getViewData(): array
    {
        return [
            'contentLinks' => [
                [
                    'label' => 'SEO Pages',
                    'description' => 'Control page-specific metadata and social previews.',
                    'icon' => Heroicon::OutlinedDocumentMagnifyingGlass,
                    'manageUrl' => SeoPagesResource::getUrl(),
                    'createUrl' => SeoPagesResource::getUrl('create'),
                ],
            ],
            'settingsLinks' => [
                [
                    'label' => 'Global Settings',
                    'description' => 'Logo, footer, site info, and default SEO fallbacks.',
                    'icon' => Heroicon::OutlinedCog6Tooth,
                    'url' => GlobalSettings::getUrl(),
                ],
                [
                    'label' => 'Marketing Settings',
                    'description' => 'Tracking pixels, verification codes, and script injections.',
                    'icon' => Heroicon::OutlinedLightBulb,
                    'url' => MarketingSettings::getUrl(),
                ],
            ],
            'supportsDatabaseSessions' => $this->supportsDatabaseSessions(),
            'activeSessions' => $this->getActiveSessions(),
        ];
    }

    protected function supportsDatabaseSessions(): bool
    {
        return config('session.driver') === 'database';
    }

    protected function getActiveSessions(): array
    {
        if (! $this->supportsDatabaseSessions() || blank(filament()->auth()->id())) {
            return [];
        }

        $cutoff = now()->subMinutes((int) config('session.lifetime', 120))->timestamp;
        $currentSessionId = session()->getId();

        return DB::connection(config('session.connection'))->table(config('session.table', 'sessions'))
            ->where('user_id', filament()->auth()->id())
            ->where('last_activity', '>=', $cutoff)
            ->orderByDesc('last_activity')
            ->get(['id', 'ip_address', 'user_agent', 'last_activity'])
            ->map(fn (object $session): array => [
                'id' => $session->id,
                'ip_address' => $session->ip_address ?: 'Unknown IP',
                'user_agent' => $session->user_agent ?: 'Unknown device',
                'last_active' => now()->setTimestamp((int) $session->last_activity)->diffForHumans(),
                'is_current' => $session->id === $currentSessionId,
            ])
            ->all();
    }
}

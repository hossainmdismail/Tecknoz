<?php

namespace App\Filament\Resources\NewsletterSubscriptions;

use App\Enums\ContactSubmissionStatus;
use App\Filament\Resources\NewsletterSubscriptions\Pages\ManageNewsletterSubscriptions;
use App\Models\NewsletterSubscription;
use App\Support\SubmissionCsv;
use BackedEnum;
use Carbon\CarbonImmutable;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\HttpFoundation\StreamedResponse;

class NewsletterSubscriptionResource extends Resource
{
    protected static ?string $model = NewsletterSubscription::class;

    protected static ?string $recordTitleAttribute = 'email';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelope;

    protected static string|\UnitEnum|null $navigationGroup = 'Data Collection';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('status')->options(ContactSubmissionStatus::class)->required(),
            Textarea::make('internal_notes')->rows(5)->maxLength(10000),
        ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema->components([
            TextEntry::make('email')->copyable(),
            TextEntry::make('status')->badge(),
            TextEntry::make('created_at')->label('Subscribed')->dateTime(),
            TextEntry::make('internal_notes')->columnSpanFull(),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('created_at')->label('Subscribed')->dateTime()->sortable(),
                TextColumn::make('email')->searchable()->sortable()->copyable(),
                TextColumn::make('status')->badge()->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')->options(ContactSubmissionStatus::class),
                Filter::make('subscribed_at')
                    ->label('Subscription date')
                    ->schema([
                        DatePicker::make('from')->label('From'),
                        DatePicker::make('until')->label('Through')->afterOrEqual('from'),
                    ])
                    ->query(fn (Builder $query, array $data): Builder => $query
                        ->when($data['from'] ?? null, fn (Builder $query, string $date): Builder => $query->where('created_at', '>=', $date))
                        ->when($data['until'] ?? null, fn (Builder $query, string $date): Builder => $query->where('created_at', '<', CarbonImmutable::parse($date)->addDay()->toDateString()))),
            ])
            ->headerActions([
                Action::make('downloadCsv')
                    ->label('Download CSV')
                    ->icon(Heroicon::OutlinedArrowDownTray)
                    ->action(fn (ManageNewsletterSubscriptions $livewire): StreamedResponse => self::download(
                        $livewire->getTableQueryForExport(),
                        'newsletter-subscriptions.csv',
                    )),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make()->label('Update status'),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    BulkAction::make('downloadSelectedCsv')
                        ->label('Download selected CSV')
                        ->icon(Heroicon::OutlinedArrowDownTray)
                        ->fetchSelectedRecords(false)
                        ->action(fn (ManageNewsletterSubscriptions $livewire): StreamedResponse => self::download(
                            $livewire->getSelectedTableRecordsQuery(false),
                            'selected-newsletter-subscriptions.csv',
                        )),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return ['index' => ManageNewsletterSubscriptions::route('/')];
    }

    private static function download(Builder $query, string $filename): StreamedResponse
    {
        return SubmissionCsv::download(
            $filename,
            ['ID', 'Subscribed at (UTC)', 'Email', 'Status', 'Internal notes'],
            $query->cursor()->map(fn (NewsletterSubscription $subscription): array => [
                $subscription->id,
                $subscription->created_at->utc()->toIso8601String(),
                $subscription->email,
                $subscription->status->getLabel(),
                $subscription->internal_notes,
            ]),
        );
    }
}

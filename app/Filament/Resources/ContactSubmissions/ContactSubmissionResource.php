<?php

namespace App\Filament\Resources\ContactSubmissions;

use App\Enums\ContactSubmissionStatus;
use App\Filament\Resources\ContactSubmissions\Pages\ManageContactSubmissions;
use App\Models\ContactSubmission;
use App\Support\ContactSubmissionCsv;
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

class ContactSubmissionResource extends Resource
{
    protected static ?string $model = ContactSubmission::class;

    protected static ?string $recordTitleAttribute = 'subject';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedInbox;

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
            TextEntry::make('name'),
            TextEntry::make('email')->copyable(),
            TextEntry::make('phone')->copyable(),
            TextEntry::make('budget_label')->label('Budget'),
            TextEntry::make('status')->badge(),
            TextEntry::make('created_at')->label('Submitted')->dateTime(),
            TextEntry::make('subject')->columnSpanFull(),
            TextEntry::make('message')->columnSpanFull(),
            TextEntry::make('internal_notes')->columnSpanFull(),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('created_at')->label('Submitted')->dateTime()->sortable(),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('email')->searchable()->sortable()->copyable(),
                TextColumn::make('phone')->searchable()->copyable()->toggleable(),
                TextColumn::make('subject')->searchable()->sortable()->wrap(),
                TextColumn::make('budget')->formatStateUsing(fn (ContactSubmission $record): string => $record->budget_label),
                TextColumn::make('status')->badge()->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')->options(ContactSubmissionStatus::class),
                SelectFilter::make('budget')->options(ContactSubmission::BUDGET_OPTIONS),
                Filter::make('submitted_at')
                    ->label('Submission date')
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
                    ->action(fn (ManageContactSubmissions $livewire): StreamedResponse => ContactSubmissionCsv::download(
                        $livewire->getTableQueryForExport(),
                        'contact-submissions.csv',
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
                        ->action(fn (ManageContactSubmissions $livewire): StreamedResponse => ContactSubmissionCsv::download(
                            $livewire->getSelectedTableRecordsQuery(false),
                            'selected-contact-submissions.csv',
                        )),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return ['index' => ManageContactSubmissions::route('/')];
    }
}

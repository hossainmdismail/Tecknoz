<?php

namespace App\Filament\Resources\Events;

use App\Filament\Resources\Events\Pages\ManageEvents;
use App\Models\Event;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $recordTitleAttribute = 'title';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendarDays;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('title')->required()->maxLength(150),
            TextInput::make('date_label')->label('Public date or year')->maxLength(100),
            Textarea::make('summary')->required()->maxLength(3000)->columnSpanFull(),
            TextInput::make('url')->label('Event or registration URL')->url()->rule('url:http,https')->maxLength(2048)->columnSpanFull(),
            TextInput::make('sort_order')->integer()->minValue(0)->maxValue(2147483647)->default(0)->required(),
            Toggle::make('is_active')->label('Published')->default(false),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('date_label')->label('Public date or year'),
                TextColumn::make('summary')->limit(90)->wrap(),
                TextColumn::make('sort_order')->sortable(),
                ToggleColumn::make('is_active')->label('Published'),
            ])
            ->filters([TernaryFilter::make('is_active')->label('Published')])
            ->recordActions([EditAction::make(), DeleteAction::make()]);
    }

    public static function getPages(): array
    {
        return ['index' => ManageEvents::route('/')];
    }
}

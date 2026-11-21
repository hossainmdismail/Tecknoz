<?php

namespace App\Filament\Resources\ContactLocations;

use App\Filament\Resources\ContactLocations\Pages\ManageContactLocations;
use App\Models\ContactLocation;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ContactLocationResource extends Resource
{
    protected static ?string $model = ContactLocation::class;

    protected static ?string $recordTitleAttribute = 'label';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMapPin;

    protected static string|\UnitEnum|null $navigationGroup = 'Settings';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('label')->label('City or display name')->required()->maxLength(150),
            TextInput::make('office_name')->maxLength(150)
                ->helperText('Add an office name or full address to show this location on the Contact page.'),
            Textarea::make('address')->label('Full address')->rows(3)->maxLength(1000)->columnSpanFull(),
            TextInput::make('map_url')->label('Map URL')->url()->rule('url:http,https')->maxLength(2048)
                ->helperText('The Contact page can generate a map link from the full address.')
                ->columnSpanFull(),
            TextInput::make('sort_order')->integer()->minValue(0)->maxValue(2147483647)->default(0)->required(),
            Toggle::make('is_active')->label('Enabled')->default(true),
            Textarea::make('map_embed_code')->label('Map embed code')->rows(2)->columnSpanFull(),
        ])->columns(2);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema->components([
            TextEntry::make('label')->label('City or display name'),
            TextEntry::make('office_name'),
            TextEntry::make('sort_order'),
            IconEntry::make('is_active')->label('Enabled')->boolean(),
            TextEntry::make('address')->label('Full address')->columnSpanFull(),
            TextEntry::make('map_url')->label('Map URL')->columnSpanFull(),
            TextEntry::make('map_embed_code')->columnSpanFull(),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->columns([
                TextColumn::make('label')->label('City or display name')->searchable()->sortable(),
                TextColumn::make('office_name')->searchable()->sortable(),
                TextColumn::make('address')->searchable()->limit(75),
                TextColumn::make('sort_order')->sortable(),
                ToggleColumn::make('is_active')->label('Enabled'),
            ])
            ->filters([
                TernaryFilter::make('is_active')->label('Status'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return ['index' => ManageContactLocations::route('/')];
    }
}

<?php

namespace App\Filament\Resources\Brands;

use App\Filament\Resources\Brands\Pages\ManageBrands;
use App\Models\Brand;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class BrandResource extends Resource
{
    protected static ?string $model = Brand::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSwatch;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            FileUpload::make('image')
                ->label('Brand image')
                ->disk('public')
                ->directory('brands/uploads')
                ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/webp', 'image/avif', 'image/gif'])
                ->maxSize(4096)
                ->required(),

            Toggle::make('is_active')
                ->label('Enabled')
                ->default(true),
        ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema->components([
            ImageEntry::make('image')->disk('public')->imageHeight(120),
            IconEntry::make('is_active')->label('Enabled')->boolean(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                ImageColumn::make('image')->label('Brand image')->disk('public')->imageHeight(48),
                ToggleColumn::make('is_active')->label('Enabled'),
            ])
            ->filters([
                TernaryFilter::make('is_active')->label('Status')->trueLabel('Enabled')->falseLabel('Disabled'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageBrands::route('/'),
        ];
    }
}

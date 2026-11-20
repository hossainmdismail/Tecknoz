<?php

namespace App\Filament\Resources\Faqs;

use App\Filament\Resources\Faqs\Pages\ManageFaqs;
use App\Models\Faq;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
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

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;

    protected static ?string $modelLabel = 'FAQ';

    protected static ?string $pluralModelLabel = 'FAQs';

    protected static ?string $recordTitleAttribute = 'question';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedQuestionMarkCircle;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('question')->required()->maxLength(255),
            Textarea::make('answer')->required()->rows(5)->maxLength(10000),
            TextInput::make('sort_order')
                ->label('Display order')
                ->integer()
                ->minValue(0)
                ->maxValue(2147483647)
                ->default(fn (): int => min((int) Faq::query()->max('sort_order') + 1, 2147483647))
                ->required(),
            Toggle::make('is_active')->label('Enabled')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->columns([
                TextColumn::make('question')->searchable()->wrap(),
                TextColumn::make('answer')->limit(80)->wrap(),
                TextColumn::make('sort_order')->label('Display order')->sortable(),
                ToggleColumn::make('is_active')->label('Enabled'),
            ])
            ->filters([
                TernaryFilter::make('is_active')->label('Status')->trueLabel('Enabled')->falseLabel('Disabled'),
            ])
            ->recordActions([ViewAction::make(), EditAction::make(), DeleteAction::make()]);
    }

    public static function getPages(): array
    {
        return ['index' => ManageFaqs::route('/')];
    }
}

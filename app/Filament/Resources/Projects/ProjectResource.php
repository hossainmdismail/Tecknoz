<?php

namespace App\Filament\Resources\Projects;

use App\Filament\Resources\Projects\Pages\CreateProject;
use App\Filament\Resources\Projects\Pages\EditProject;
use App\Filament\Resources\Projects\Pages\ListProjects;
use App\Filament\Resources\Projects\Pages\ViewProject;
use App\Models\Project;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Project')
                ->schema([
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(function (?string $state, ?string $old, Get $get, Set $set, string $operation): void {
                            if ($operation === 'create' && (blank($get('slug')) || $get('slug') === Str::slug($old ?? ''))) {
                                $set('slug', Str::slug($state ?? ''));
                            }
                        }),
                    TextInput::make('slug')
                        ->required()
                        ->maxLength(191)
                        ->regex('/^[a-z0-9]+(?:-[a-z0-9]+)*$/')
                        ->unique(ignoreRecord: true)
                        ->prefix('/project/'),
                    Textarea::make('summary')->rows(3)->columnSpanFull(),
                    RichEditor::make('details')
                        ->fileAttachmentsDisk('public')
                        ->fileAttachmentsDirectory('projects/content')
                        ->columnSpanFull(),
                    RichEditor::make('services_rendered')
                        ->fileAttachmentsDisk('public')
                        ->fileAttachmentsDirectory('projects/content')
                        ->columnSpanFull(),
                ])
                ->columns(2)
                ->columnSpanFull(),
            Section::make('Media and client')
                ->schema([
                    FileUpload::make('image')
                        ->label('Main project image')
                        ->disk('public')
                        ->directory('projects/images')
                        ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/webp', 'image/avif', 'image/gif'])
                        ->maxSize(8192),
                    FileUpload::make('client_logo')
                        ->disk('public')
                        ->directory('projects/logos')
                        ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/webp', 'image/avif', 'image/gif'])
                        ->maxSize(4096),
                    TextInput::make('client')->maxLength(255),
                    TextInput::make('industry')->maxLength(255),
                    DatePicker::make('deadline'),
                    ColorPicker::make('color')->regex('/^#[a-fA-F0-9]{6}$/'),
                ])
                ->columns(2)
                ->columnSpanFull(),
            Section::make('Publishing')
                ->schema([
                    Toggle::make('is_published')
                        ->label('Published')
                        ->helperText('Make this project visible on the public site.'),
                    Toggle::make('is_featured')
                        ->label('Featured project')
                        ->helperText('Show this project on the homepage when published.'),
                ])
                ->columns(2)
                ->columnSpanFull(),
        ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema->components([
            TextEntry::make('name'),
            TextEntry::make('slug'),
            TextEntry::make('summary')->columnSpanFull(),
            ImageEntry::make('image')->label('Main project image')->disk('public')->imageHeight(160),
            ImageEntry::make('client_logo')->disk('public')->imageHeight(80),
            TextEntry::make('client'),
            TextEntry::make('industry'),
            TextEntry::make('deadline')->date(),
            TextEntry::make('color'),
            IconEntry::make('is_published')->label('Published')->boolean(),
            IconEntry::make('is_featured')->label('Featured')->boolean(),
            TextEntry::make('published_at')->dateTime(),
            TextEntry::make('details')->html()->columnSpanFull(),
            TextEntry::make('services_rendered')->html()->columnSpanFull(),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                ImageColumn::make('image')->disk('public')->imageHeight(48),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('client')->searchable(),
                IconColumn::make('is_published')->label('Published')->boolean(),
                IconColumn::make('is_featured')->label('Featured')->boolean(),
                TextColumn::make('published_at')->dateTime()->sortable(),
            ])
            ->filters([
                TernaryFilter::make('is_published')
                    ->label('Status')
                    ->trueLabel('Published')
                    ->falseLabel('Draft')
                    ->nullable()
                    ->attribute('published_at'),
                TernaryFilter::make('is_featured')->label('Featured'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                Action::make('openWebsite')
                    ->label('Open website')
                    ->icon(Heroicon::OutlinedArrowTopRightOnSquare)
                    ->url(fn (Project $record): string => route('projects.show', $record->slug))
                    ->openUrlInNewTab()
                    ->visible(fn (Project $record): bool => $record->is_published),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProjects::route('/'),
            'create' => CreateProject::route('/create'),
            'view' => ViewProject::route('/{record}'),
            'edit' => EditProject::route('/{record}/edit'),
        ];
    }
}

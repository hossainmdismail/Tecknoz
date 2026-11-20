<?php

namespace App\Filament\Resources\BlogPosts;

use App\Filament\Resources\BlogPosts\Pages\CreateBlogPost;
use App\Filament\Resources\BlogPosts\Pages\EditBlogPost;
use App\Filament\Resources\BlogPosts\Pages\ListBlogPosts;
use App\Filament\Resources\BlogPosts\Pages\ViewBlogPost;
use App\Models\BlogPost;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
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
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class BlogPostResource extends Resource
{
    protected static ?string $model = BlogPost::class;

    protected static ?string $recordTitleAttribute = 'title';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedNewspaper;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Post')
                ->schema([
                    TextInput::make('title')
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
                        ->prefix('/post/'),
                    Select::make('blog_category_id')
                        ->label('Category')
                        ->relationship('category', 'name')
                        ->searchable()
                        ->preload(),
                    TextInput::make('read_time')->label('Reading time (minutes)')->integer()->minValue(1)->maxValue(255),
                    Textarea::make('summary')->rows(3)->columnSpanFull(),
                    RichEditor::make('body')
                        ->fileAttachmentsDisk('public')
                        ->fileAttachmentsDirectory('blogs/content')
                        ->columnSpanFull(),
                ])
                ->columns(2)
                ->columnSpanFull(),
            Section::make('Media')
                ->schema([
                    FileUpload::make('image')
                        ->label('Main image')
                        ->disk('public')
                        ->directory('blogs/images')
                        ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/webp', 'image/avif', 'image/gif'])
                        ->maxSize(8192),
                    FileUpload::make('thumbnail')
                        ->disk('public')
                        ->directory('blogs/images')
                        ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/webp', 'image/avif', 'image/gif'])
                        ->maxSize(4096),
                ])
                ->columns(2)
                ->columnSpanFull(),
            Section::make('Publishing')
                ->schema([
                    Toggle::make('is_published')
                        ->label('Published')
                        ->helperText('Make this post visible on the public site.'),
                    Toggle::make('is_featured')
                        ->label('Featured post')
                        ->helperText('Show this post on the homepage when published.'),
                ])
                ->columns(2)
                ->columnSpanFull(),
        ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema->components([
            TextEntry::make('title'),
            TextEntry::make('slug'),
            TextEntry::make('summary')->columnSpanFull(),
            ImageEntry::make('image')->label('Main image')->disk('public')->imageHeight(160),
            ImageEntry::make('thumbnail')->disk('public')->imageHeight(80),
            TextEntry::make('category.name')->label('Category'),
            TextEntry::make('read_time')->label('Reading time (minutes)'),
            IconEntry::make('is_published')->label('Published')->boolean(),
            IconEntry::make('is_featured')->label('Featured')->boolean(),
            TextEntry::make('published_at')->dateTime(),
            TextEntry::make('body')->html()->columnSpanFull(),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                ImageColumn::make('image')->disk('public')->imageHeight(48),
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('category.name')->label('Category'),
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
                SelectFilter::make('blog_category_id')->label('Category')->relationship('category', 'name'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                Action::make('openWebsite')
                    ->label('Open website')
                    ->icon(Heroicon::OutlinedArrowTopRightOnSquare)
                    ->url(fn (BlogPost $record): string => route('blogs.show', $record->slug))
                    ->openUrlInNewTab()
                    ->visible(fn (BlogPost $record): bool => $record->is_published),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBlogPosts::route('/'),
            'create' => CreateBlogPost::route('/create'),
            'view' => ViewBlogPost::route('/{record}'),
            'edit' => EditBlogPost::route('/{record}/edit'),
        ];
    }
}

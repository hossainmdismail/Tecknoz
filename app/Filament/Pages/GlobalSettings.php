<?php

namespace App\Filament\Pages;

use App\Enums\ContactChannel;
use App\Models\GlobalSetting;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\EmbeddedSchema;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class GlobalSettings extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Global Settings';

    protected static ?string $title = 'Global Settings';

    protected static ?int $navigationSort = 3;

    protected static string|\UnitEnum|null $navigationGroup = 'Settings';

    protected string $view = 'filament.pages.global-settings';

    public ?array $data = [];

    public ?GlobalSetting $record = null;

    public function mount(): void
    {
        $this->record = GlobalSetting::currentOrCreate();

        $this->form->fill($this->record->refresh()->toArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Tabs::make('Global Settings')
                    ->tabs([
                        Tab::make('General')
                            ->schema([
                                Section::make('General Information')
                                    ->schema([
                                        Forms\Components\TextInput::make('site_name')
                                            ->label('Site Name')
                                            ->helperText('Primary brand or website name used throughout the site and as SEO fallback.')
                                            ->required()
                                            ->maxLength(150),

                                        Forms\Components\TextInput::make('site_tagline')
                                            ->label('Site Tagline')
                                            ->helperText('Short supporting tagline or slogan for the brand.')
                                            ->maxLength(255),

                                        Forms\Components\Textarea::make('company_short_description')
                                            ->label('Company Short Description')
                                            ->helperText('Brief reusable company summary for footer and SEO fallback.')
                                            ->rows(4)
                                            ->columnSpanFull(),

                                        Forms\Components\FileUpload::make('logo_path')
                                            ->label('Logo')
                                            ->helperText('Main brand logo used across the website.')
                                            ->disk('public')
                                            ->directory('settings')
                                            ->image()
                                            ->imageEditor()
                                            ->maxSize(4096),

                                        Forms\Components\FileUpload::make('favicon_path')
                                            ->label('Favicon')
                                            ->helperText('Browser tab icon displayed in tabs and bookmarks.')
                                            ->disk('public')
                                            ->directory('settings')
                                            ->image()
                                            ->maxSize(2048),
                                    ])
                                    ->columns(2),
                            ]),

                        Tab::make('Contact')
                            ->schema([
                                Section::make('Locations')
                                    ->schema([
                                        Forms\Components\Repeater::make('contact_locations')
                                            ->hiddenLabel()
                                            ->helperText('Locations appear in this order on the public site.')
                                            ->addActionLabel('Add location')
                                            ->defaultItems(0)
                                            ->collapsible()
                                            ->collapsed()
                                            ->itemLabel(fn (array $state): ?string => $state['label'] ?? null)
                                            ->schema([
                                                Forms\Components\TextInput::make('label')
                                                    ->label('City or display name')
                                                    ->live(onBlur: true)
                                                    ->required()
                                                    ->maxLength(150),

                                                Forms\Components\TextInput::make('office_name')
                                                    ->label('Office name')
                                                    ->maxLength(150),

                                                Forms\Components\Textarea::make('address')
                                                    ->label('Full address')
                                                    ->rows(2)
                                                    ->maxLength(1000),

                                                Forms\Components\TextInput::make('map_url')
                                                    ->label('Map URL')
                                                    ->url()
                                                    ->rule('url:http,https')
                                                    ->maxLength(2048),

                                                Forms\Components\Textarea::make('map_embed_code')
                                                    ->label('Map embed code')
                                                    ->rows(2)
                                                    ->columnSpanFull(),
                                            ])
                                            ->columns(2),
                                    ]),

                                Section::make('Contact channels')
                                    ->schema([
                                        Forms\Components\Repeater::make('contact_channels')
                                            ->hiddenLabel()
                                            ->helperText('The first Email appears in the footer. The first linked Phone, WhatsApp, WeChat and Messenger entry is used in the floating bar.')
                                            ->addActionLabel('Add contact channel')
                                            ->defaultItems(0)
                                            ->collapsible()
                                            ->collapsed()
                                            ->itemLabel(fn (array $state): ?string => ($state['label'] ?? null)
                                                ?: ContactChannel::tryFrom($state['type'] ?? '')?->label())
                                            ->schema([
                                                Forms\Components\Select::make('type')
                                                    ->options(collect(ContactChannel::cases())
                                                        ->mapWithKeys(fn (ContactChannel $channel): array => [$channel->value => $channel->label()])
                                                        ->all())
                                                    ->required()
                                                    ->live(),

                                                Forms\Components\TextInput::make('label')
                                                    ->placeholder('e.g. Sales or UK office')
                                                    ->live(onBlur: true)
                                                    ->maxLength(150),

                                                Forms\Components\TextInput::make('value')
                                                    ->label(fn (Get $get): string => match ($get('type')) {
                                                        'phone', 'whatsapp' => 'Number with country code',
                                                        'email' => 'Email address',
                                                        'wechat' => 'WeChat ID',
                                                        'messenger' => 'Display name',
                                                        default => 'Contact value',
                                                    })
                                                    ->tel(fn (Get $get): bool => in_array($get('type'), ['phone', 'whatsapp'], true))
                                                    ->telRegex('/^\+?[0-9][0-9 ().-]{5,48}$/')
                                                    ->email(fn (Get $get): bool => $get('type') === 'email')
                                                    ->required()
                                                    ->maxLength(150),

                                                Forms\Components\TextInput::make('url')
                                                    ->label(fn (Get $get): string => $get('type') === 'wechat' ? 'QR image or profile URL' : 'Messenger or Facebook URL')
                                                    ->url()
                                                    ->rule('url:http,https')
                                                    ->maxLength(2048)
                                                    ->visible(fn (Get $get): bool => in_array($get('type'), ['wechat', 'messenger'], true))
                                                    ->required(fn (Get $get): bool => $get('type') === 'messenger'),

                                                Forms\Components\FileUpload::make('qr_image')
                                                    ->label('WeChat QR image')
                                                    ->disk('public')
                                                    ->directory('settings/contact')
                                                    ->image()
                                                    ->maxSize(4096)
                                                    ->visible(fn (Get $get): bool => $get('type') === 'wechat')
                                                    ->columnSpanFull(),
                                            ])
                                            ->columns(2),
                                    ]),

                                Section::make('Availability')
                                    ->schema([
                                        Forms\Components\TextInput::make('business_hours')
                                            ->maxLength(255),
                                    ]),
                            ]),

                        Tab::make('Social Links')
                            ->schema([
                                Section::make('Social Media Links')
                                    ->schema([
                                        Forms\Components\TextInput::make('facebook_url')
                                            ->label('Facebook URL')
                                            ->helperText('Full Facebook profile or page URL.')
                                            ->url()
                                            ->maxLength(255),

                                        Forms\Components\TextInput::make('linkedin_url')
                                            ->label('LinkedIn URL')
                                            ->helperText('Full LinkedIn company or profile URL.')
                                            ->url()
                                            ->maxLength(255),

                                        Forms\Components\TextInput::make('twitter_url')
                                            ->label('Twitter / X URL')
                                            ->helperText('Full Twitter/X profile URL.')
                                            ->url()
                                            ->maxLength(255),

                                        Forms\Components\TextInput::make('youtube_url')
                                            ->label('YouTube URL')
                                            ->helperText('Full YouTube channel URL.')
                                            ->url()
                                            ->maxLength(255),

                                        Forms\Components\TextInput::make('instagram_url')
                                            ->label('Instagram URL')
                                            ->helperText('Full Instagram profile URL.')
                                            ->url()
                                            ->maxLength(255),
                                    ])
                                    ->columns(2),
                            ]),

                        Tab::make('Footer')
                            ->schema([
                                Section::make('Footer Information')
                                    ->schema([
                                        Forms\Components\Textarea::make('footer_text')
                                            ->label('Footer Text')
                                            ->helperText('Short descriptive text displayed in footer.')
                                            ->rows(4)
                                            ->columnSpanFull(),

                                        Forms\Components\TextInput::make('copyright_text')
                                            ->label('Copyright Text')
                                            ->helperText('Copyright notice shown in footer bottom bar.')
                                            ->maxLength(255)
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),
                            ]),

                        Tab::make('Default SEO')
                            ->schema([
                                Section::make('Default SEO Settings')
                                    ->schema([
                                        Forms\Components\TextInput::make('default_meta_title')
                                            ->label('Default Meta Title')
                                            ->helperText('Fallback meta title when page-specific SEO title is missing.')
                                            ->maxLength(255),

                                        Forms\Components\Textarea::make('default_meta_description')
                                            ->label('Default Meta Description')
                                            ->helperText('Fallback meta description when page-specific SEO is missing.')
                                            ->rows(4)
                                            ->columnSpanFull(),

                                        Forms\Components\TextInput::make('default_og_title')
                                            ->label('Default OG Title')
                                            ->helperText('Fallback Open Graph title for social sharing.')
                                            ->maxLength(255),

                                        Forms\Components\Textarea::make('default_og_description')
                                            ->label('Default OG Description')
                                            ->helperText('Fallback Open Graph description for social sharing.')
                                            ->rows(4)
                                            ->columnSpanFull(),

                                        Forms\Components\FileUpload::make('default_og_image_path')
                                            ->label('Default OG Image')
                                            ->helperText('Fallback social sharing preview image.')
                                            ->disk('public')
                                            ->directory('settings')
                                            ->image()
                                            ->imageEditor()
                                            ->maxSize(4096),

                                        Forms\Components\TextInput::make('canonical_base_url')
                                            ->label('Canonical Base URL')
                                            ->helperText('Primary site domain for canonical URL generation.')
                                            ->url()
                                            ->maxLength(255)
                                            ->placeholder('https://example.com'),

                                        Forms\Components\Select::make('default_robots_meta')
                                            ->label('Default Robots Meta')
                                            ->helperText('Default robots directive when page-specific setting is absent.')
                                            ->options([
                                                'index,follow' => 'index,follow',
                                                'noindex,nofollow' => 'noindex,nofollow',
                                                'index,nofollow' => 'index,nofollow',
                                                'noindex,follow' => 'noindex,follow',
                                            ])
                                            ->default('index,follow')
                                            ->native(false),
                                    ])
                                    ->columns(2),
                            ]),
                    ])
                    ->columnSpanFull(),
            ])
            ->model($this->record)
            ->statePath('data');
    }

    public function content(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getFormContentComponent(),
            ]);
    }

    public function getFormContentComponent(): Component
    {
        return Form::make([EmbeddedSchema::make('form')])
            ->id('form')
            ->livewireSubmitHandler('save')
            ->footer([
                Actions::make($this->getFormActions()),
            ]);
    }

    /**
     * @return array<Action>
     */
    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Save Settings')
                ->submit('save')
                ->keyBindings(['mod+s']),
        ];
    }

    public function save(): void
    {
        $state = $this->form->getState();

        $this->record->update($state);

        Notification::make()
            ->title('Global settings updated successfully.')
            ->success()
            ->send();
    }
}

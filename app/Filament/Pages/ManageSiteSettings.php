<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

/**
 * @property-read Schema $form
 */
class ManageSiteSettings extends Page
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string|UnitEnum|null $navigationGroup = 'Paramètres';

    protected static ?string $navigationLabel = 'Paramètres du site';

    protected static ?string $title = 'Paramètres du site';

    protected static ?int $navigationSort = 99;

    protected string $view = 'filament.pages.manage-site-settings';

    /** @var array<string, mixed>|null */
    public ?array $data = [];

    protected ?SiteSetting $record = null;

    public function mount(): void
    {
        $this->form->fill($this->getRecord()->attributesToArray());
    }

    protected function getRecord(): SiteSetting
    {
        return $this->record ??= SiteSetting::current();
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->model($this->getRecord())
            ->statePath('data')
            ->components([
                Section::make("Page d'accueil")
                    ->description("Textes affichés sur la page d'accueil (sélection des univers).")
                    ->schema([
                        Textarea::make('home_title')
                            ->label('Titre principal')
                            ->rows(2)
                            ->helperText('Les retours à la ligne sont conservés.'),
                        TextInput::make('home_subtitle')
                            ->label('Sous-titre'),
                    ]),

                Section::make('Booking (pied de page de l’accueil)')
                    ->description('Coordonnées affichées dans le pied de page de la page d’accueil.')
                    ->schema([
                        TextInput::make('booking_phone')
                            ->label('Téléphone')
                            ->tel(),
                        TextInput::make('booking_email')
                            ->label('E-mail'),
                    ]),

                Section::make('Réseaux sociaux & galerie')
                    ->description('Titre de la section réseaux et galerie d’images affichée en bas de chaque univers.')
                    ->schema([
                        TextInput::make('social_title')
                            ->label('Titre de la section'),
                        FileUpload::make('gallery_images')
                            ->label('Galerie d’images')
                            ->image()
                            ->multiple()
                            ->reorderable()
                            ->appendFiles()
                            ->directory('gallery')
                            ->maxSize(5120)
                            ->helperText('Glissez-déposez pour réordonner. JPG/PNG/WebP, 5 Mo max par image.'),
                    ]),
            ]);
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $this->getRecord()->fill($data)->save();

        Notification::make()
            ->title('Paramètres enregistrés')
            ->success()
            ->send();
    }
}

<?php

namespace App\Filament\Widgets;

use App\Models\Agenda;
use App\Models\News;
use App\Models\Page;
use App\Models\Teaser;
use App\Models\Work;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Pages', Page::count())
                ->description('Univers actifs')
                ->descriptionIcon('heroicon-o-document-text')
                ->color('info'),

            Stat::make('Réalisations', Work::count())
                ->description('Films & projets')
                ->descriptionIcon('heroicon-o-film')
                ->color('primary'),

            Stat::make('Teasers', Teaser::count())
                ->description('Vidéos & liens')
                ->descriptionIcon('heroicon-o-video-camera')
                ->color('primary'),

            Stat::make('Actualités', News::count())
                ->description('Articles & presse')
                ->descriptionIcon('heroicon-o-newspaper')
                ->color('success'),

            Stat::make('Agendas', Agenda::count())
                ->description('Événements à venir')
                ->descriptionIcon('heroicon-o-calendar-days')
                ->color('warning'),
        ];
    }
}

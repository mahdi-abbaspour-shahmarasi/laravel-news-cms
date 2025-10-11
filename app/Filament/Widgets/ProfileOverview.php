<?php

namespace App\Filament\Widgets;

use Auth;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProfileOverview extends BaseWidget
{

    use HasWidgetShield;
    protected function getStats(): array
    {
        return [
            Auth::user()->name . ' عزیز '  . 'به پنل کاربری خود خوش امدید!'
        ];
    }
}

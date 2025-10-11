<?php

namespace App\Filament\Widgets;

use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Visit;
use App\Models\Post;
use Illuminate\Support\Carbon;


class StatsOverview extends BaseWidget
{

    use HasWidgetShield;
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        $all_visits_count=Visit::get()->count();
        $all_visitors_count=Visit::distinct()->count('ip_address');

        $today_visits_count=Visit::where('created_at', '>=', Carbon::today())->get()->count();
        $today_visitors_count=Visit::where('created_at', '>=', Carbon::today())->distinct()->count('ip_address');

        $all_news=Post::count();
        $today_news=Post::where('created_at', '>=', Carbon::today())->count();
        return [
            Stat::make('مجموع اخبار منتشر شده', $all_news)
                ->description($today_news.' منتشر شده امروز '),
            Stat::make('مجموع بازدید', $all_visits_count)
                ->description($all_visitors_count.' بازدید کننده'),
            Stat::make('بازدید های امروز', $today_visits_count)
                ->description($today_visitors_count.' بازدید کننده'),

        ];
    }

}

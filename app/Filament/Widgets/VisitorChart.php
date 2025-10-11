<?php

namespace App\Filament\Widgets;

use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Filament\Widgets\ChartWidget;
use App\Models\Visit;
use Illuminate\Support\Carbon;
class VisitorChart extends ChartWidget
{

    use HasWidgetShield;
    protected static ?string $heading = 'بازدیدکننده هفتگی';
    protected static ?int $sort = 2;


    protected function getData(): array
    {

        $dt=[];
        $v=[];
        $s=0;
        for($i=0; $i<7; $i++)
        {
            $currentDate= Carbon::today()->subDays($i);
            $dt[]=$currentDate->format('Y/m/d');
            $visits=Visit::where('created_at', '>=', $currentDate)->distinct()->count('ip_address')-$s;
            $v[]=$visits;
            $s+=$visits;

        }


        return [
            'datasets' => [
                [
                    'label' => 'آمار بازدیدکننده هفتگی',
                    'data' => array_reverse($v),
                    'backgroundColor'=> [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                ],
            ],
            'labels' => array_reverse($dt),

            'hoverOffset'=> 4,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
    // public static function canView(): bool
    // {
    //     return auth()->user()?->can('view stats overview widget') ?? false;
    // }
}

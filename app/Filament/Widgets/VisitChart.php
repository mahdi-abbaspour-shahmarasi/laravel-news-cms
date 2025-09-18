<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Visit;
use Illuminate\Support\Carbon;
class VisitChart extends ChartWidget
{
    protected static ?string $heading = 'بازدید هفتگی';
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
            $visits=Visit::where('created_at', '>=', $currentDate)->get()->count()-$s;
            $v[]=$visits;
            $s+=$visits;

        }


        return [
            'datasets' => [
                [
                    'label' => 'آمار بازدید هفتگی',
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
}

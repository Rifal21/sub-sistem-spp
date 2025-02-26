<?php

namespace App\Filament\Resources\SPPChartResource\Widgets;

use Filament\Widgets\ChartWidget;

class SPPStats extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}

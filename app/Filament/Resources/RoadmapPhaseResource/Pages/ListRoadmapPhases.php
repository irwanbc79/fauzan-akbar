<?php

namespace App\Filament\Resources\RoadmapPhaseResource\Pages;

use App\Filament\Resources\RoadmapPhaseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRoadmapPhases extends ListRecords
{
    protected static string $resource = RoadmapPhaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

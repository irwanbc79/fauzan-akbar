<?php

namespace App\Filament\Resources\KajianScheduleResource\Pages;

use App\Filament\Resources\KajianScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKajianSchedules extends ListRecords
{
    protected static string $resource = KajianScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KajianScheduleResource\Pages;
use App\Filament\Resources\KajianScheduleResource\RelationManagers;
use App\Models\KajianSchedule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KajianScheduleResource extends Resource
{
    protected static ?string $model = KajianSchedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = 'Kajian';

    protected static ?string $modelLabel = 'Jadwal Kajian';

    protected static ?string $pluralModelLabel = 'Jadwal Kajian';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Detail Kajian')
                    ->schema([
                        Forms\Components\Select::make('day')
                            ->label('Hari')
                            ->options([
                                'Ahad' => 'Ahad',
                                'Senin' => 'Senin',
                                'Selasa' => 'Selasa',
                                'Rabu' => 'Rabu',
                                'Kamis' => 'Kamis',
                                'Jumat' => 'Jumat',
                                'Sabtu' => 'Sabtu',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Kajian')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('ustaz')
                            ->label('Ustaz / Pemateri')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('date')
                            ->label('Tanggal'),
                        Forms\Components\TimePicker::make('time')
                            ->label('Waktu (HKT)'),
                        Forms\Components\Select::make('platform')
                            ->label('Platform')
                            ->options([
                                'zoom' => 'Zoom',
                                'whatsapp' => 'WhatsApp',
                                'both' => 'Zoom & WhatsApp',
                                'offline' => 'Tatap Muka',
                            ])
                            ->default('zoom')
                            ->required(),
                        Forms\Components\TextInput::make('platform_link')
                            ->label('Link Platform')
                            ->url()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->columnSpanFull(),
                    ])->columns(2),
                Forms\Components\Section::make('Status')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->options([
                                'upcoming' => 'Akan Datang',
                                'completed' => 'Selesai',
                                'cancelled' => 'Dibatalkan',
                            ])
                            ->default('upcoming')
                            ->required(),
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('day')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ustaz')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('time'),
                Tables\Columns\TextColumn::make('platform')
                    ->searchable(),
                Tables\Columns\TextColumn::make('platform_link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKajianSchedules::route('/'),
            'create' => Pages\CreateKajianSchedule::route('/create'),
            'edit' => Pages\EditKajianSchedule::route('/{record}/edit'),
        ];
    }
}

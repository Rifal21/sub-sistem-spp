<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SPPResource\Pages;
use App\Filament\Resources\SPPResource\RelationManagers;
use App\Models\SPP;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SPPResource extends Resource
{
    protected static ?string $model = SPP::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nama_siswa')->required(),
            TextInput::make('kelas')->required(),
            TextInput::make('jumlah_tagihan')->numeric()->required(),
            DatePicker::make('jatuh_tempo')->required(),
            Select::make('status')
                ->options([
                    'Lunas' => 'Lunas',
                    'Belum Lunas' => 'Belum Lunas',
                ])
                ->required(),
            TextInput::make('email')->email()->required(),
            TextInput::make('whatsapp')->required(),
        ]);
    }


    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_siswa')->label('Nama Siswa')->sortable()->searchable(),
                TextColumn::make('kelas')->label('Kelas')->sortable()->searchable(),
                TextColumn::make('jumlah_tagihan')->label('Tagihan')->money('IDR')->sortable(),
                TextColumn::make('jatuh_tempo')->label('Jatuh Tempo')->date(),
                TextColumn::make('status')->label('Status')
                    ->badge()
                    ->color(fn($record) => $record->status === 'Lunas' ? 'success' : 'danger'),
                TextColumn::make('email')->label('Email'),
                TextColumn::make('whatsapp')->label('WhatsApp'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'Lunas' => 'Lunas',
                        'Belum Lunas' => 'Belum Lunas',
                    ]),
            ])
            ->defaultSort('jatuh_tempo', 'asc');
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
            'index' => Pages\ListSPPS::route('/'),
            'create' => Pages\CreateSPP::route('/create'),
            'edit' => Pages\EditSPP::route('/{record}/edit'),
        ];
    }
}

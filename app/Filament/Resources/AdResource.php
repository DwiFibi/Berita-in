<?php

namespace App\Filament\Resources;

use App\Models\Ad;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\AdResource\Pages;

class AdResource extends Resource
{
    protected static ?string $model = Ad::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul Iklan')
                    ->required()
                    ->maxLength(255),

                Forms\Components\FileUpload::make('image_path')
                    ->label('Gambar Iklan')
                    ->image()
                    ->directory('ads')
                    ->required()
                    ->helperText('Rekomendasi ukuran gambar: 220 x 250 px'),

                Forms\Components\TextInput::make('link')
                    ->label('Link Tujuan (Opsional)')
                    ->url()
                    ->nullable(),

                Forms\Components\Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Gambar')
                    ->rounded(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Iklan')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('position')
                    ->label('Posisi')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('months_active')
                    ->label('Sudah Aktif')
                    ->getStateUsing(function (Ad $record) {
                        $created = Carbon::parse($record->created_at);
                        $now = Carbon::now();
                        $diffInMonths = $created->diffInMonths($now);
                        return $diffInMonths . ' bulan';
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAds::route('/'),
            'create' => Pages\CreateAd::route('/create'),
            'edit' => Pages\EditAd::route('/{record}/edit'),
        ];
    }
    public static function canViewAny(): bool
    {
        return auth()->user()->hasRole('admin');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->hasRole('admin');
    }
}

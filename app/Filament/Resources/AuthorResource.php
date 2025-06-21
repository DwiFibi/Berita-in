<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuthorResource\Pages;
use App\Models\Author;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;

class AuthorResource extends Resource
{
    protected static ?string $model = Author::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Content';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Hidden::make('user_id')
                    ->default(fn() => auth()->id())
                    ->required(),

                FileUpload::make('profile_image')
                    ->label('Profile Image')
                    ->image()
                    ->directory('authors')
                    ->disk('public')
                    ->nullable(),

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('bio')
                    ->label('Biography')
                    ->maxLength(1000),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
                ImageColumn::make('profile_image')
                    ->disk('public')
                    ->label('Profile')
                    ->circular(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->visible(fn() => auth()->user()?->hasRole('admin')), // Hanya admin bisa hapus
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAuthors::route('/'),
            'create' => Pages\CreateAuthor::route('/create'),
            'edit' => Pages\EditAuthor::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        return auth()->user()?->hasAnyRole(['admin', 'author']);
    }

    public static function getEloquentQuery(): Builder
    {
        // Admin bisa lihat semua, author hanya lihat miliknya
        if (auth()->user()?->hasRole('author')) {
            return parent::getEloquentQuery()->where('user_id', auth()->id());
        }

        return parent::getEloquentQuery();
    }
}

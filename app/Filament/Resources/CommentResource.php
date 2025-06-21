<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Models\Comment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    // Tambahkan baris-baris berikut agar muncul di sidebar:
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';
    protected static ?string $navigationLabel = 'Komentar';
    protected static ?string $navigationGroup = 'Konten'; // Group menu
    protected static ?int $navigationSort = 3; // Urutan di sidebar

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('article_id')
                ->relationship('article', 'title')
                ->required(),
            Forms\Components\Select::make('parent_id')
                ->relationship('parent', 'id')
                ->nullable(),
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\TextInput::make('email')->required()->email(),
            Forms\Components\Textarea::make('content')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')->searchable(),
            Tables\Columns\TextColumn::make('email'),
            Tables\Columns\TextColumn::make('content')->limit(50),
            Tables\Columns\TextColumn::make('article.title')->label('Artikel'),
            Tables\Columns\TextColumn::make('created_at')->label('Tanggal')->dateTime(),
        ])
            ->actions([
                EditAction::make(),   // <-- ini tombol Edit
                DeleteAction::make(), // tombol hapus yang sudah ada
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
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

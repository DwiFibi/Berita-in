<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use App\Models\Category;
use App\Models\Author;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Checkbox;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Fieldset;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Filament\Facades\Filament;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 2;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->required()
                ->maxLength(255)
                ->columnSpan('full'),

            Select::make('author_id')
                ->label('Penulis')
                ->options(function () {
                    $user = Filament::auth()->user();

                    if ($user->hasRole('admin')) {
                        return Author::all()->pluck('name', 'id');
                    }

                    return Author::where('user_id', $user->id)->pluck('name', 'id');
                })
                ->required()
                ->searchable()
                ->placeholder('Pilih Penulis')
                ->columnSpan('full')
                ->disabled(function () {
                    return Filament::auth()->user()->hasRole('editor');
                }),

            RichEditor::make('content')
                ->required()
                ->columnSpan('full'),

            FileUpload::make('image_path')
                ->label('Image')
                ->image()
                ->disk('public')
                ->directory('articles')
                ->nullable(),

            Select::make('category_id')
                ->label('Category')
                ->relationship('category', 'name')
                ->required(),

            Select::make('status')
                ->options([
                    'draft' => 'Draft',
                    'publish' => 'Publish',
                ])
                ->required(),

            Forms\Components\DateTimePicker::make('published_at')
                ->label('Published At')
                ->default(Carbon::now())
                ->nullable(),

            Fieldset::make('Tipe Berita')
                ->schema([
                    Toggle::make('is_latest')
                        ->label('Latest News'),

                    Toggle::make('is_popular')
                        ->label('Trending Post'),

                    Toggle::make('is_featured')
                        ->label('Featured Post'),

                    Toggle::make('is_newest')
                        ->label('Breaking News'),

                    Toggle::make('is_highlight')
                        ->label('News Highlight'),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            TextColumn::make('title')
                ->searchable()
                ->sortable(),

            TextColumn::make('author.name')
                ->label('Author')
                ->sortable()
                ->searchable(),

            TextColumn::make('category.name')
                ->sortable(),

            TextColumn::make('status')
                ->sortable(),

            ImageColumn::make('image_path')
                ->disk('public')
                ->url(fn(Article $record) => Storage::url($record->image_path)),

            TextColumn::make('uploaded_at')
                ->label('Uploaded At')
                ->dateTime('d M Y H:i')
                ->sortable(),

            BadgeColumn::make('is_latest')
                ->label('Terkini')
                ->icon(fn($state) => $state ? 'heroicon-o-check' : 'heroicon-o-x-mark')
                ->color(fn($state) => $state ? 'success' : 'danger')
                ->sortable(),

            BadgeColumn::make('is_popular')
                ->label('Populer')
                ->icon(fn($state) => $state ? 'heroicon-o-check' : 'heroicon-o-x-mark')
                ->color(fn($state) => $state ? 'success' : 'danger')
                ->sortable(),

            BadgeColumn::make('is_featured')
                ->label('Unggulan')
                ->icon(fn($state) => $state ? 'heroicon-o-check' : 'heroicon-o-x-mark')
                ->color(fn($state) => $state ? 'success' : 'danger')
                ->sortable(),

            BadgeColumn::make('is_newest')
                ->label('Terbaru')
                ->icon(fn($state) => $state ? 'heroicon-o-check' : 'heroicon-o-x-mark')
                ->color(fn($state) => $state ? 'success' : 'danger')
                ->sortable(),

            BadgeColumn::make('is_highlight')
                ->label('Highlight')
                ->icon(fn($state) => $state ? 'heroicon-o-check' : 'heroicon-o-x-mark')
                ->color(fn($state) => $state ? 'success' : 'danger')
                ->sortable(),

        ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->hasAnyRole(['admin', 'author']);
    }

    public static function canView(Model $record): bool
    {
        return auth()->user()->hasRole('admin') || $record->author_id === auth()->user()->author->id;
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()->hasRole('admin') || $record->author_id === auth()->user()->author->id;
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()->hasRole('admin') || $record->author_id === auth()->user()->author->id;
    }

    public static function canCreate(): bool
    {
        return auth()->user()->hasAnyRole(['admin', 'author']);
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if (auth()->user()->hasRole('author')) {
            $author = auth()->user()->author;

            if ($author) {
                return $query->where('author_id', $author->id);
            } else {
                // Jika author tidak ada, kembalikan query kosong agar tidak error
                return $query->whereRaw('0 = 1');
            }
        }

        return $query;
    }
}

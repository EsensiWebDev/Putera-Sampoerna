<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\Article;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Full-width row for the toggle
                Forms\Components\Toggle::make('isPublished')
                    ->label('Publish Article')
                    ->onColor('success')
                    ->offColor('danger')
                    ->default(true)
                    ->columnSpanFull(),

                Forms\Components\Group::make([
                    Forms\Components\Select::make('author_id')
                        ->label('Author')
                        ->options(User::pluck('name', 'id'))
                        ->default(Auth::id())
                        ->preload(),

                    Forms\Components\DateTimePicker::make('created_at')
                        ->default(now())
                        ->required()
                        ->label('Created At'),
                ])
                    ->columns(2),

                Forms\Components\Group::make([
                    Forms\Components\TextInput::make('category')
                        ->label('Category (English)'),

                    Forms\Components\TextInput::make('category_ind')
                        ->label('Category (Indonesia)'),

                ])
                    ->columns(2),

                Forms\Components\Group::make([
                    Forms\Components\TagsInput::make('tags')
                        ->label('Tags (English)')
                        ->separator(',')
                        ->saveRelationshipsWhenHidden(),

                    Forms\Components\TagsInput::make('tags_ind')
                        ->label('Tags (Indonesia)')
                        ->separator(',')
                        ->saveRelationshipsWhenHidden(),

                ])
                    ->columns(2),

                Forms\Components\Group::make([
                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->minLength(5)
                        ->maxLength(255)
                        ->unique('articles', 'slug', ignoreRecord: true)
                        ->label('Slug (English)')
                        ->afterStateUpdated(
                            fn($state, callable $set) =>
                            $set('link', url('/news/' . $state))
                        ),
                    Forms\Components\TextInput::make('slug_ind')
                        ->required()
                        ->minLength(5)
                        ->maxLength(255)
                        ->unique('articles', 'slug_ind', ignoreRecord: true)
                        ->label('Slug (Indonesia)')
                        ->afterStateUpdated(
                            fn($state, callable $set) =>
                            $set('link_ind', url('/news/' . $state))
                        ),

                ])
                    ->columns(2),

                Forms\Components\Group::make([
                    Forms\Components\TextInput::make('title_english')
                        ->minLength(5)
                        ->maxLength(255)
                        ->label('Title (English)'),
                    Forms\Components\TextInput::make('title_indonesia')
                        ->minLength(5)
                        ->maxLength(255)
                        ->label('Title (Indonesian)'),
                ])
                    ->columns(2),

                Forms\Components\FileUpload::make('thumbnail')
                    ->image()
                    ->disk('public')
                    ->directory('images')
                    ->columnSpanFull()
                    ->visibility('public')
                    ->preserveFilenames()
                    ->label('Thumbnail'),

                Forms\Components\RichEditor::make('content_indonesia')
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('content_english')
                    ->columnSpanFull(),

                Forms\Components\Group::make([
                    Forms\Components\Textarea::make('keyword')
                        ->autosize()
                        ->label('Keyword (English)'),
                    Forms\Components\Textarea::make('keyword_ind')
                        ->autosize()
                        ->label('Keyword (Indonesia)'),
                ])
                    ->columns(2),

                Forms\Components\Group::make([
                    Forms\Components\TextInput::make('meta_description')
                        ->label('Meta Description (English)'),
                    Forms\Components\TextInput::make('meta_description_ind')
                        ->label('Meta Description (Indonesia)'),
                ])
                    ->columns(2),

                Forms\Components\Hidden::make('lang')
                    ->default('id') // Set the default value
                    ->columnSpanFull(),

                Forms\Components\Hidden::make('link') // Add the hidden link field
                    ->default(fn($get) => url('/news/' . $get('slug'))) // Dynamically create the URL using the slug field
                    ->columnSpanFull(),
                Forms\Components\Hidden::make('link_ind') // Add the hidden link field
                    ->default(fn($get) => url('/news/' . $get('slug_ind'))) // Dynamically create the URL using the slug field
                    ->columnSpanFull(),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title_indonesia')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title_english')
                    ->searchable(),
                Tables\Columns\TextColumn::make('author.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('isPublished')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->date()
                    ->searchable(),
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
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}

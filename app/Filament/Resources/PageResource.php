<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Forms\Components\GrapesJsEditor;
use App\Models\Page;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Livewire\Component as Livewire;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required()
                    ->afterStateUpdated(function ($state, callable $set) {
                        // Replace spaces with hyphens and trim extra spaces
                        $slug = strtolower(preg_replace('/\s+/', '-', trim($state)));
                        $set('slug', $slug); // Update the slug field with the transformed value
                    }),
                Select::make('lang')
                    ->label('Language')
                    ->options([
                        'id' => 'Indonesia',
                        'en' => 'English',
                    ])
                    ->default('id')
                    ->native(false)
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function (?string $state, Livewire $livewire, Page $page) {
                        $livewire->dispatch(
                            'lang-changed',
                            ['lang' => $state, 'content' => $page['content_' . $state ?? '']]
                        );

                        //                        $set('content', $page['content_'.$state]);
                    }),
                DateTimePicker::make('published_at')
                    ->seconds(false)
                    ->default(now())
                    ->native(false)
                    ->required(),
                Toggle::make('visibility')
                    ->default(true)
                    ->required(),
                GrapesJsEditor::make('content')
                    ->id('content')
                    ->label('Content')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('slug')->searchable()->sortable(),
                IconColumn::make('visibility')->boolean()->sortable(),
                TextColumn::make('createdBy.name')->label('Created By')->sortable(),
                TextColumn::make('created_at')->label('Created At')->dateTime()->sortable(),
            ])
            ->filters([
                TernaryFilter::make('visibility')
                    ->nullable()
                    ->placeholder('All')
                    ->trueLabel('Visible')
                    ->falseLabel('Hidden'),
            ])
            ->actions([
                ViewAction::make()
                    ->url(fn(Page $page): string => url('/id/' . $page->slug))->openUrlInNewTab(),
                EditAction::make(),
                DeleteAction::make()
                    ->requiresConfirmation(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->requiresConfirmation(),
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use CodeWithDennis\FilamentSelectTree\SelectTree;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-document-text';    
    protected static ?string $navigationGroup = 'محتوا';    
    protected static ?string $modelLabel = 'خبر';    
    protected static ?string $pluralModelLabel = 'خبر ها';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('on_titr')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('titr')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('lead')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('remote_thumbnail')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\FileUpload::make('local_thumbnail')
                    ->image()
                    ->imageEditor()
                    ->default(null),
                TinyEditor::make('text')
                    ->rtl()
                    ->columnSpanFull(),   
                Forms\Components\Textarea::make('tags')
                    ->columnSpanFull(),              
                Forms\Components\Toggle::make('is_published')
                    ->required(),
                Forms\Components\Toggle::make('allow_comments')
                    ->required(),  
                SelectTree::make('category_id')
                    ->withCount()
                    ->searchable()
                    ->enableBranchNode()
                    ->relationship('categories', 'name', 'parent_id'),                             
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([  
                Tables\Columns\ImageColumn::make('thumbnail'),          
                Tables\Columns\TextColumn::make('titr')
                    ->searchable(),                
                Tables\Columns\TextColumn::make('view_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean(),
                Tables\Columns\IconColumn::make('allow_comments')
                    ->boolean(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}

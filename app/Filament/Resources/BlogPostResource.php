<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogPostResource\Pages;
use App\Filament\Resources\BlogPostResource\RelationManagers;
use App\Models\BlogPost;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Panel;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class BlogPostResource extends Resource
{
    protected static ?string $model = BlogPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'CMS';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(),
                Forms\Components\TextInput::make('slug')
                    ->dehydrated()
                    ->default(fn($record) => $record ? $record->slug : Str::slug(request('title')))
                    ->unique('blog_posts', 'slug', ignoreRecord: true),
                Forms\Components\RichEditor::make('content')->required(),
                Forms\Components\FileUpload::make('image')->image()->directory('blog-images')->maxSize(2048),
                Forms\Components\Select::make('status')->options([
                    'draft' => 'Draft',
                    'published' => 'Published',
                ])->default('draft'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->circular(),
                Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
                Tables\Columns\SelectColumn::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                    ])
                    ->getStateUsing(function (BlogPost $record) {
                        return $record->status;
                    }),
                Tables\Columns\TextColumn::make('user.name')->label('Author')->sortable(),
                Tables\Columns\TextColumn::make('slug')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
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

    public static function canViewAny(): bool
    {

        return true;
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
            'index' => Pages\ListBlogPosts::route('/'),
            'create' => Pages\CreateBlogPost::route('/create'),
            'edit' => Pages\EditBlogPost::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use App\Models\Category;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->required()->maxLength(255),
            
            Textarea::make('description')->rows(4)->nullable(),

            TextInput::make('price')->numeric()->required(),

            FileUpload::make('image')
                    ->disk('public') // ✅ Ensure it uses the correct storage disk
                    ->directory('products') // ✅ Store in storage/app/public/products/
                    ->image()
                    ->visibility('public') // ✅ Make sure it's accessible
                    ->previewable(true) // ✅ Allows preview in edit mode
                    ->downloadable() // ✅ Enables download option
                    ->getUploadedFileNameForStorageUsing(fn ($file) => 'products/' . $file->hashName()) // ✅ Store correct path
                    ->default(fn ($record) => $record && $record->image ? asset('storage/' . $record->image) : null), // ✅ Store correct path

            Select::make('categories')
                ->multiple()
                ->relationship('categories', 'name')
                ->preload()
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('price')->sortable(),
                TextColumn::make('categories.name')->badge()->separator(', '),
                // ✅ Correct way to display images in the table
                ImageColumn::make('image')
                    ->disk('public') // Ensure it loads from the correct storage
                    ->size(50)
                    ->label('Product Image')
                    ->getStateUsing(fn ($record) => $record->image ? asset('storage/' . $record->image) : null),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\Schemas\UserForm;
use App\Filament\Resources\Users\Tables\UsersTable;
use App\Models\User;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;
use BackedEnum;
use UnitEnum;
use Filament\Support\Icons\Heroicon;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserCircle;

    protected static string|UnitEnum|null $navigationGroup = 'Administración';


    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        // 🔥 SUPER ADMIN VE TODO
        if (
            auth()->check()
            && auth()->user()->hasRole('super_admin')
        ) {
            return $query;
        }

        // 👥 RESTO DE USUARIOS → SOLO SU TENANT
        if (auth()->check()) {
            return $query->where(
                'tenant_id',
                auth()->user()->tenant_id
            );
        }

        return $query;
    }

    public static function form(Schema $schema): Schema
    {
        return UserForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UsersTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit'   => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}

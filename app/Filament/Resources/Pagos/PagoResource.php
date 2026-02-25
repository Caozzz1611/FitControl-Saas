<?php

namespace App\Filament\Resources\Pagos;

use App\Filament\Resources\Pagos\Pages;
use App\Filament\Resources\Pagos\Schemas\PagoForm;
use App\Filament\Resources\Pagos\Tables\PagosTable;
use App\Models\Pago;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;
use BackedEnum;
use UnitEnum;
use Filament\Support\Icons\Heroicon;

class PagoResource extends Resource
{
    protected static ?string $model = Pago::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCreditCard;

    protected static string|UnitEnum|null $navigationGroup = 'Finanzas';

    protected static ?string $recordTitleAttribute = 'id_usu_fk';

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

        // 👥 RESTO → SOLO EL TENANT ACTIVO
        if ($tenant = Filament::getTenant()) {
            return $query->where('tenant_id', $tenant->id);
        }

        return $query;
    }

    public static function form(Schema $schema): Schema
    {
        return PagoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PagosTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPagos::route('/'),
            'create' => Pages\CreatePago::route('/create'),
            'edit'   => Pages\EditPago::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Models\Traits;

use App\Models\Tenant;
use Illuminate\Database\Eloquent\Builder;

trait BelongsToTenant
{
    protected static function booted()
    {
        // 🌍 FILTRO GLOBAL POR TENANT (el super_admin ve todo)
        static::addGlobalScope('tenant', function (Builder $query) {
            if (auth()->check() && ! auth()->user()->hasRole('super_admin')) {
                $query->where('tenant_id', auth()->user()->tenant_id);
            }
        });

        // 🧩 ASIGNAR tenant_id SIEMPRE AL CREAR (INCLUSO super_admin)
        static::creating(function ($model) {
            if (auth()->check()) {
                $model->tenant_id = auth()->user()->tenant_id;
            }
        });
    }

    // 🔗 RELACIÓN CON TENANT
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $fillable = [
        'tenant_id',
        'name',
        'email',
        'password',
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}

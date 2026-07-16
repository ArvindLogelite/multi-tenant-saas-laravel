<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        'company_name',
        'schema_name',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
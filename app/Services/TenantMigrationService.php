<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class TenantMigrationService
{
    public function migrate(string $schema)
    {
        // Users Table
        Schema::create($schema . '.users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Tasks Table
        Schema::create($schema . '.tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }
}
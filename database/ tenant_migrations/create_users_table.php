<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class {

    public function up($schema)
    {
        Schema::create($schema . '.users', function (Blueprint $table) {

            $table->id();

            $table->string('name');

            $table->string('email')->unique();

            $table->string('password');

            $table->rememberToken();

            $table->timestamps();
        });
    }

    public function down($schema)
    {
        Schema::dropIfExists($schema . '.users');
    }
};

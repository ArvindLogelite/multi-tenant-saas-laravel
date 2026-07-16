<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class {

    public function up($schema)
    {
        Schema::create($schema.'.tasks', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id');

            $table->string('title');

            $table->text('description')->nullable();

            $table->timestamps();

        });
    }

    public function down($schema)
    {
        Schema::dropIfExists($schema.'.tasks');
    }

};
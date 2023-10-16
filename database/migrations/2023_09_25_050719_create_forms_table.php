<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->integer('types');
            $table->string('name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('subject');
            $table->string('message');
            $table->integer('number');
            $table->integer('telephone');
            $table->json('checkbox');
            $table->string('select');
            $table->string('radio');
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};

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
        Schema::create('optionals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('name_subject_id'); // Use 'unsignedBigInteger' instead of 'integer'
            $table->foreign('name_subject_id')
                ->references('id')
                ->on('name__subjects') // Correct the table name to 'name_subjects'
                ->onDelete('cascade');
            $table->string('level'); // Correct the column name to 'level'
            $table->string('placeholder');
            $table->string('class');
            $table->integer('length');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('optionals');
    }
};

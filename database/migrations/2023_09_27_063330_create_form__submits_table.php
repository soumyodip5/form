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
        Schema::create('form__submits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('name_subject_id');
            $table->foreign('name_subject_id')
                ->references('id')
                ->on('name__subjects');
            $table->string('f_name');
            $table->string('m_name');
            $table->string('l_name');
            $table->text('email');
            $table->string('subject');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form__submits');
    }
};

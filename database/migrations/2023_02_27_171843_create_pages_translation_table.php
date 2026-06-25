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
        Schema::create('pages_translation', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('pages_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('slug');
            $table->string('link')->nullable();
            $table->string('template')->nullable();
            $table->text('image')->nullable();
            $table->string('language_code');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);

            // foreign key
            $table->foreign('pages_id')->references('id')->on('pages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages_translation');
    }
};

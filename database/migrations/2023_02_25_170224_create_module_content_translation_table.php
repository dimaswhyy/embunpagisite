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
        Schema::create('module_content_translation', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('module_content_id');
            $table->string('title');
            $table->text('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->string('language_code');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);

            // foreign key
            $table->foreign('module_content_id')->references('id')->on('module_content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_content_translation');
    }
};

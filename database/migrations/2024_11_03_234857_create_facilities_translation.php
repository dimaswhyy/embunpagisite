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
        Schema::create('facilities_translation', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('facilities_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('slug');
            $table->text('image')->nullable();
            $table->string('language_code');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);

            // foreign key
            $table->foreign('facilities_id')->references('id')->on('facilities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facilities_translation');
    }
};

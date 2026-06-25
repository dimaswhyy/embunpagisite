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
        Schema::create('facilities', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('facilities_category_id');
            $table->string('status')->default('publish');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);

            // foreign key
            $table->foreign('facilities_category_id')->references('id')->on('facilities_category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facilities');
    }
};

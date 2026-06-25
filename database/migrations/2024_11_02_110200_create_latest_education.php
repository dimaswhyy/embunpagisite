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
        Schema::create('latest_education', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('apply_id');
            $table->string('level');
            $table->string('institution');
            $table->string('major');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);

            // Define the foreign key constraint
            $table->foreign('apply_id')
                ->references('id')
                ->on('apply_job')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('latest_education');
    }
};

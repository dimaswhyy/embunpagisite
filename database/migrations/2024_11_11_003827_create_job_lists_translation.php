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
        Schema::create('job_lists_translation', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('job_lists_id');
            $table->string('title');
            $table->text('description');
            $table->string('slug');
            $table->string('language_code');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);

            // foreign key
            $table->foreign('job_lists_id')->references('id')->on('job_lists');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_lists_translation');
    }
};

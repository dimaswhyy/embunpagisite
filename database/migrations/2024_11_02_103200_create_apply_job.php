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
        Schema::create('apply_job', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('job_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('email');
            $table->text('address');
            $table->string('english_proficiency');
            $table->bigInteger('latest_salary');
            $table->bigInteger('salary_expectation');
            $table->boolean('agree');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);

            // Define the foreign key constraint
            $table->foreign('job_id')
                ->references('id')
                ->on('job_lists')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apply_job');
    }
};

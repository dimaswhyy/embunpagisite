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
        Schema::create('job_experience', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('apply_id');
            $table->string('company_name');
            $table->string('position');
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::dropIfExists('job_experience');
    }
};

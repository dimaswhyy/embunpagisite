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
        Schema::create('booking_school_tour', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('child_name');
            $table->string('parent_name');
            $table->string('phone');
            $table->string('email');
            $table->text('address');
            $table->string('program');
            $table->date('visit_date');
            $table->time('visit_time');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_school_tour');
    }
};

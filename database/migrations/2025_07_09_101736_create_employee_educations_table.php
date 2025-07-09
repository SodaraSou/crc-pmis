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
        Schema::create('degree_types', function (Blueprint $table) {
            $table->id();
            $table->string('kh_name');
            $table->string('en_name')->nullable();
            $table->timestamps();
        });

        Schema::create('employee_educations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->string('institution');
            $table->foreignId('degree_type_id')->constrained();
            $table->string('field_of_study');
            $table->year('start_year')->nullable();
            $table->year('end_year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('degree_types');
        Schema::dropIfExists('employee_educations');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('kh_name');
            $table->string('en_name');
            $table->foreignId('family_situation_id')->constrained()->cascadeOnDelete();
            $table->foreignId('gender_id')->constrained()->cascadeOnDelete();
            $table->date('dob');
            $table->string('national_id')->unique();
            $table->foreignId('employee_status_id')->constrained()->cascadeOnDelete();
            $table->string('phone_number')->unique();
            $table->string('email')->unique();
            $table->string('profile_img');
            $table->foreignId('bp_province_id')->constrained('provinces')->cascadeOnDelete();
            $table->foreignId('bp_district_id')->constrained('districts')->cascadeOnDelete();
            $table->foreignId('bp_commune_id')->constrained('communes')->cascadeOnDelete();
            $table->foreignId('bp_village_id')->constrained('villages')->cascadeOnDelete();
            $table->foreignId('ad_province_id')->constrained('provinces')->cascadeOnDelete();
            $table->foreignId('ad_district_id')->constrained('districts')->cascadeOnDelete();
            $table->foreignId('ad_commune_id')->constrained('communes')->cascadeOnDelete();
            $table->foreignId('ad_village_id')->constrained('villages')->cascadeOnDelete();
            $table->string('ad_street_number')->nullable();
            $table->string('ad_street_name')->nullable();
            $table->string('ad_house_number')->nullable();
            $table->foreignId('employee_level_id')->constrained('user_levels')->cascadeOnDelete();
            $table->foreignId('branch_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('sub_branch_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('department_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('office_id')->nullable()->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

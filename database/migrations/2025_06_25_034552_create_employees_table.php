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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('kh_name');
            $table->string('en_name');
            $table->foreignId('family_situation_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('gender_id')->constrained()->cascadeOnDelete();
            $table->date('dob')->nullable();
            $table->string('national_id')->nullable();
            $table->foreignId('employee_status_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('profile_img')->nullable();
            $table->foreignId('bp_province_id')->nullable()->constrained('provinces')->cascadeOnDelete();
            $table->foreignId('bp_district_id')->nullable()->constrained('districts')->cascadeOnDelete();
            $table->foreignId('bp_commune_id')->nullable()->constrained('communes')->cascadeOnDelete();
            $table->foreignId('bp_village_id')->nullable()->constrained('villages')->cascadeOnDelete();
            $table->foreignId('ad_province_id')->nullable()->constrained('provinces')->cascadeOnDelete();
            $table->foreignId('ad_district_id')->nullable()->constrained('districts')->cascadeOnDelete();
            $table->foreignId('ad_commune_id')->nullable()->constrained('communes')->cascadeOnDelete();
            $table->foreignId('ad_village_id')->nullable()->constrained('villages')->cascadeOnDelete();
            $table->string('ad_street_number')->nullable();
            $table->string('ad_street_name')->nullable();
            $table->string('ad_house_number')->nullable();
            $table->boolean('active')->default(true);
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
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

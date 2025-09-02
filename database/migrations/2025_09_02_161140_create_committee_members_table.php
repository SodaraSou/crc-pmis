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
        Schema::create('committee_members', function (Blueprint $table) {
            $table->id();
            $table->string('kh_name');
            $table->string('en_name');
            $table->foreignId('gender_id')->constrained();
            $table->string('phone_number')->nullable();
            $table->foreignId('bp_province_id')->constrained('provinces');
            $table->foreignId('bp_district_id')->constrained('districts');
            $table->foreignId('bp_commune_id')->constrained('communes');
            $table->foreignId('bp_village_id')->constrained('villages');
            $table->foreignId('ad_province_id')->constrained('provinces');
            $table->foreignId('ad_district_id')->constrained('districts');
            $table->foreignId('ad_commune_id')->constrained('communes');
            $table->foreignId('ad_village_id')->constrained('villages');
            $table->boolean('active')->default(true);
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });

        Schema::create('committee_member_term', function (Blueprint $table) {
            $table->id();
            $table->foreignId('committee_member_id')->constrained();
            $table->foreignId('term_id')->constrained();
            $table->foreignId('committee_position_id')->constrained();
            $table->foreignId('committee_id')->constrained();
            $table->foreignId('committee_member_type_id')->constrained();
            $table->string('gov_position')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
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
        Schema::dropIfExists('committee_member_term');
        Schema::dropIfExists('committee_members');
    }
};

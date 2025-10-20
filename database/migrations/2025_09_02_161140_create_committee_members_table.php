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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('kh_first_name');
            $table->string('kh_last_name');
            $table->string('en_name');
            $table->string('member_img')->nullable();
            $table->foreignId('gender_id')->constrained();
            $table->string('phone_number')->nullable();
            $table->foreignId('bp_province_id')->nullable()->constrained('provinces');
            $table->foreignId('bp_district_id')->nullable()->constrained('districts');
            $table->foreignId('bp_commune_id')->nullable()->constrained('communes');
            $table->foreignId('bp_village_id')->nullable()->constrained('villages');
            $table->foreignId('ad_province_id')->nullable()->constrained('provinces');
            $table->foreignId('ad_district_id')->nullable()->constrained('districts');
            $table->foreignId('ad_commune_id')->nullable()->constrained('communes');
            $table->foreignId('ad_village_id')->nullable()->constrained('villages');
            $table->boolean('active')->default(true);
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });

        Schema::create('committee_member', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained();
            $table->foreignId('branch_term_id')->nullable()->constrained();
            $table->foreignId('sub_branch_term_id')->nullable()->constrained();
            $table->foreignId('committee_position_id')->constrained();
            $table->foreignId('committee_id')->constrained();
            $table->string('gov_position')->nullable();
            $table->integer('member_position_order')->nullable();
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
        Schema::dropIfExists('committee_member');
        Schema::dropIfExists('members');
    }
};

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
        Schema::create('committee_levels', function (Blueprint $table) {
            $table->id();
            $table->string('en_name');
            $table->string('kh_name');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('committee_types', function (Blueprint $table) {
            $table->id();
            $table->string('kh_name');
            $table->string('en_name')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('committees', function (Blueprint $table) {
            $table->id();
            $table->string('en_name');
            $table->string('kh_name');
            $table->foreignId('branch_id')->nullable()->constrained();
            $table->foreignId('sub_branch_id')->nullable()->constrained();
            $table->foreignId('committee_type_id')->constrained();
            $table->foreignId('committee_level_id')->constrained();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('committees');
        Schema::dropIfExists('committee_types');
        Schema::dropIfExists('committee_levels');
    }
};

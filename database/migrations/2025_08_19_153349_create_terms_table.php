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
        Schema::create('branch_terms', function (Blueprint $table) {
            $table->id();
            $table->string('en_name');
            $table->string('kh_name');
            $table->foreignId('branch_id')->constrained();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('sub_branch_terms', function (Blueprint $table) {
            $table->id();
            $table->string('en_name');
            $table->string('kh_name');
            $table->foreignId('sub_branch_id')->constrained();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terms');
    }
};

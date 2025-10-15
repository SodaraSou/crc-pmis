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
        Schema::create('sub_branches', function (Blueprint $table) {
            $table->id();
            $table->string('en_name')->nullable();
            $table->string('kh_name');
            $table->boolean('active')->default(true);
            $table->foreignId('branch_id')->constrained();
            $table->foreignId('district_id')->constrained();
            $table->string('sub_branch_img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_branches');
    }
};

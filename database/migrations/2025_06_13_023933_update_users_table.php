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
        Schema::table('users', function (Blueprint $table) {
            $table->string('kh_name');
            $table->string('phone_number');
            $table->string('profile_img')->nullable();
            $table->boolean('active')->default(true);
            $table->foreignId('user_level_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign([
                'user_level_id',
            ]);
            $table->dropColumn([
                'kh_name',
                'phone_number',
                'profile_img',
                'active',
                'user_level_id'
            ]);
        });
    }
};

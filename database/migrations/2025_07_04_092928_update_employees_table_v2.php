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
        Schema::table('employees', function (Blueprint $table) {
            $table->foreignId('group_id')->nullable()->constrained();
            $table->foreignId('current_position_id')->nullable()->constrained('employee_position');
        });

        Schema::table('employee_position', function (Blueprint $table) {
            $table->foreignId('group_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign([
                'group_id',
                'current_position_id',
            ]);
            $table->dropColumn([
                'group_id',
                'current_position_id',
            ]);
        });

        Schema::table('employee_position', function (Blueprint $table) {
            $table->dropForeign([
                'group_id',
            ]);
            $table->dropColumn([
                'group_id',
            ]);
        });
    }
};

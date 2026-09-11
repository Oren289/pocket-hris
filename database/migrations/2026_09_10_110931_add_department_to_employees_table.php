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
        // Schema::table('employees', function (Blueprint $table) {
        //     $table->foreignId('department_id')
        //         ->after('manager_id')
        //         ->nullable()
        //         ->constrained('departments')
        //         ->onDelete('set null');
        // });

        // Schema::table('departments', function (Blueprint $table) {
        //     $table->foreignId('dept_head_id')
        //         ->after('description')
        //         ->nullable()
        //         ->constrained('employees')
        //         ->onDelete('set null');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('department');
        });
    }
};

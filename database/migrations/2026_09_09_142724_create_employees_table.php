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

            // Link to the users table (one-to-one: each user account can have one employee profile)
            $table->foreignId('user_id')
                ->unique()
                ->nullable()
                ->constrained('users')
                ->onDelete('cascade');

            // Self-referencing key for the employee's manager/supervisor
            $table->foreignId('manager_id')
                ->nullable()
                ->constrained('employees')
                ->onDelete('set null');

            // Identification
            $table->string('employee_code')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone', 30)->nullable();

            // Employment details
            $table->foreignId('department_id')
                ->nullable()
                ->constrained('departments')
                ->onDelete('set null');
            $table->string('job_title')->nullable();
            $table->enum('employment_type', ['full_time', 'part_time', 'contract', 'intern'])
                ->default('full_time');
            $table->enum('status', ['active', 'inactive', 'on_leave', 'terminated'])
                ->default('active');
            $table->date('hire_date')->nullable();
            $table->date('termination_date')->nullable();

            // Compensation
            $table->decimal('salary', 12, 2)->nullable();
            $table->string('currency', 3)->default('IDR');

            // Personal details
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female', 'other', 'prefer_not_to_say'])->nullable();
            $table->string('national_id', 50)->nullable();

            // Address
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->string('country')->nullable();

            // Emergency contact
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_phone', 30)->nullable();

            $table->timestamps();
            $table->softDeletes();
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
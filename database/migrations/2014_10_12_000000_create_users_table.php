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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->enum('role', ['manager', 'admin' , 'employee'])->default('employee');
            $table->integer('hourly_paid')->default(0);
            $table->integer('weekly_paid')->default(0);
            $table->integer('monthly_paid')->default(0);
            $table->integer('yearly_paid')->default(0);
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();

            // Foreign key for department
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};


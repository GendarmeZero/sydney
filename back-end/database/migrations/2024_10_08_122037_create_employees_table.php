<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->integer('age');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('mobile');
            $table->string('house_phone')->nullable();
            $table->enum('status', ['active', 'inactive', 'terminated']);
            $table->decimal('degree_score', 5, 2);
            $table->foreignId('department_id')->nullable()->constrained()->onDelete('set null');
            $table->date('work_start_date');
            $table->integer('paid_vacation_time')->default(0);
            $table->integer('no_show_count')->default(0);
            $table->decimal('hourly_rate', 10, 2);
            $table->decimal('annual_salary', 10, 2);
            $table->integer('achievements_count')->default(0);
            $table->string('social_security_number');
            $table->foreignId('role_id')->nullable()->constrained()->onDelete('set null');
            $table->boolean('has_car')->default(false);
            $table->integer('kids_number')->nullable();
            $table->string('nationality');
            $table->enum('military_service', ['yes', 'no']);
            $table->enum('sex', ['male', 'female', 'other']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}

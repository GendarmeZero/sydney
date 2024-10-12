<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->integer('total_tasks')->default(0);
            $table->integer('tasks_done')->default(0);
            $table->integer('tasks_failed')->default(0);
            $table->integer('tasks_switched')->default(0);
            $table->timestamps();

            // Foreign key to users table (employees)
            $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};

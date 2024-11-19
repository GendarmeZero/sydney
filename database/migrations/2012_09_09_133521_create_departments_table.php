<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->timestamps();
            $table->decimal('budget', 15, 2)->nullable(); // Adjust type and precision as needed
            $table->string('description')->nullable(); // Adding description column
            $table->string('location')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('departments');
    }
}

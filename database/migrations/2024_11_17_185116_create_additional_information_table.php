<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalInformationTable extends Migration
{
    public function up()
    {
        Schema::create('additional_information', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // Ensure InnoDB engine
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key for users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Cascade delete for user

            $table->string('profile_image')->nullable(); // Store profile image path

            $table->date('birth_date')->nullable(); // Birth date field
            $table->enum('has_car', ['yes', 'no'])->nullable(); // Nullable enum
            $table->enum('living_in', ['apartment', 'house'])->nullable(); // Living situation (apartment or house)
            $table->integer('kids_number')->nullable(); // Nullable integer column for number of kids
            $table->string('spouse_name')->nullable(); // Wife's name (nullable)

            // Foreign key for resume
            $table->unsignedBigInteger('resume_id')->nullable();
            $table->foreign('resume_id')->references('id')->on('resumes')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down()
    {
        // Drop the 'additional_information' table
        Schema::dropIfExists('additional_information');
    }
}

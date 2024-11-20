<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewsTable extends Migration
{
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the interview (e.g., Interviewer name, position name, etc.)
            $table->date('interview_date'); // The actual date of the interview
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key reference to the user who created the record
            $table->foreignId('resume_id')->constrained()->onDelete('cascade'); // Foreign key reference to the resume
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('interviews');
    }
}

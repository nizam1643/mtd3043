<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateM9StudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m9_students', function (Blueprint $table) {
            $table->id();
            $table->string('point1');
            $table->string('point2');
            $table->string('point3');
            $table->string('point4');
            $table->string('point5');
            $table->string('pointMark');
            $table->foreignId('student_id');
            $table->foreign('student_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m9_students');
    }
}

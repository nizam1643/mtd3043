<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserM3sujectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_m3sujects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('subject_id');
            $table->foreign('subject_id')->references('id')->on('m3_subjects');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('user__m3sujects');
    }
}

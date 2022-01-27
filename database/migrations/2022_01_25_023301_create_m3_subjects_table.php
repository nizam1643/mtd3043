<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateM3SubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m3_subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->string('subject_code');
            $table->text('desc');
            $table->text('thumbnail');
            $table->foreignId('year_id');
            $table->foreign('year_id')->references('id')->on('m1_years')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('group_id');
            $table->foreign('group_id')->references('id')->on('m2_groups')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('m3_subjects');
    }
}

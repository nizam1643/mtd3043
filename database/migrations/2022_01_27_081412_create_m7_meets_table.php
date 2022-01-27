<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateM7MeetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m7_meets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('url');
            $table->foreignId('subject_id');
            $table->foreign('subject_id')->references('id')->on('m3_subjects');
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
        Schema::dropIfExists('m7_meets');
    }
}

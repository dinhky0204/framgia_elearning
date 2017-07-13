<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('follow_student', function(Blueprint $table){
        $table->increments('id');
        $table->integer('following')->unsigned();
        $table->foreign('following')->references('id')->on('users');
        $table->integer('follower')->unsigned();
        $table->foreign('follower')->references('id')->on('users');
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
        Schema::dropIfExists('follow_student');
    }
}

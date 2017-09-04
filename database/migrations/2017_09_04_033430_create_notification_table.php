<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_student', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user1')->unsigned();
            $table->foreign('user1')->references('id')->on('users');
            $table->integer('user2')->unsigned();
            $table->foreign('user2')->references('id')->on('users');
            $table->string('content');
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
        Schema::dropIfExists('notification_student'); 
    }
}

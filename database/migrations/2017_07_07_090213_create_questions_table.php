<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('questions',function(Blueprint $table) {
        $table->increments('id');
        $table->string('question_content');
        $table->integer('total_answer');
        $table->integer('point');
        $table->string('description');
        $table->integer('course_id')->unsigned();
        $table->integer('question_type_id')->unsigned();
        $table->foreign('course_id')->references('id')->on('courses');
        $table->foreign('question_type_id')->references('id')->on('question_types');
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
        Schema::dropIfExists('questions');
    }
}

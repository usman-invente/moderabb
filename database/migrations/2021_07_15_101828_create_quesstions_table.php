<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuesstionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quesstions', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('question');
            $table->string('question_image');
            $table->string('score');
            $table->string('course_id');
            $table->string('lesson_id');
            $table->string('tests');
            $table->string('option_text_1');
            $table->string('explanation_1');
            $table->string('correct_1');
            $table->string('option_text_2');
            $table->string('explanation_2');
            $table->string('correct_2');
            $table->string('option_text_3');
            $table->string('explanation_3');
            $table->string('correct_3');
            $table->string('option_text_4');
            $table->string('explanation_4');
            $table->string('correct_4');
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
        Schema::dropIfExists('quesstions');
    }
}

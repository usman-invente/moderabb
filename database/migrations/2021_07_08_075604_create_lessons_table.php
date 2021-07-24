<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('course_id');
            $table->string('title');
            $table->string('url');
            $table->longText('short_text');
            $table->longText('full_text');
            $table->string('downloadable_files');
            $table->string('add_audio');
            $table->string('add_pdf');
            $table->string('media_type');
            $table->string('video');
            $table->string('video_file');
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
        Schema::dropIfExists('lessons');
    }
}

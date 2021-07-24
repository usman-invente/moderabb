<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiplomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diplomas', function (Blueprint $table) {
            $table->id();
            $table->string('courses');
            $table->string('eccbody_id');
            $table->string('category_id');
            $table->string('bag_type');
            $table->string('title');
            $table->string('slug');
            $table->string('description');
            $table->string('price');
            $table->string('course_image');
            $table->string('price_certificate');
            $table->string('certificate');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('level');
            $table->string('voltage');
            $table->string('duration');
            $table->string('recording_url');
            $table->string('email');
            $table->string('published');
            $table->string('featured');
            $table->string('trending');
            $table->string('popular');
            $table->string('free');
            $table->string('c_purchase');
            $table->longText('goals');
            $table->longText('requirements');
            $table->longText('outputs');
            $table->longText('target_group');
            $table->longText('sponsor_name');
            $table->string('media_type');
            $table->string('video');
            $table->string('video_file');
            $table->string('meta_title');
            $table->longText('meta_description');
            $table->longText('meta_keywords');
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
        Schema::dropIfExists('diplomas');
    }
}

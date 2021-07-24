<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('telephone');
            $table->string('dob');
            $table->string('sex');
            $table->string('country');
            $table->string('email')->unique();
            $table->string('avatar_location');
            $table->string('academic_rank');
            $table->string('nationality');
            $table->string('facbook');
            $table->string('twitter');
            $table->string('linkedin');
            $table->string('instagram');
            $table->string('passport');
            $table->string('photo_academic_degree');
            $table->string('cv');
            $table->string('bank_name');
            $table->string('bank_country');
            $table->string('ibn_number');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

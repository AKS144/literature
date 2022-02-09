<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('dob');
            $table->string('username');
            $table->string('mobile');
            $table->string('email');
            $table->string('id_type');
            $table->string('id_no');
            $table->string('gender');
            $table->string('profile_img');
            $table->unsignedInteger('user_id');
            $table->foreign('user')->references('id')->on('users');
            $table->unsignedInteger('category');
            $table->foreign('category')->references('id')->on('categories');
            $table->unsignedInteger('location');
            $table->foreign('location')->references('id')->on('locations');
            $table->string('url_twitter')->nullable();
            $table->string('url_instagram')->nullable();
            $table->string('url_linkedin')->nullable();
            $table->string('url_facebook')->nullable();
            $table->string('skills')->nullable();
            $table->string('exp_yrs')->nullable();
            $table->mediumText('worked_loc');
            $table->string('course_name');
            $table->string('course_cert_img')->nullable();
            $table->string('qualification');
            $table->string('studio')->nullable();
            $table->longText('studio_address')->nullable();
            $table->string('camera')->nullable();
            $table->mediumText('cam_desc')->nullable();
            $table->string('tripod')->nullable();
            $table->mediumText('tripod_desc')->nullable();
            $table->string('drone')->nullable();
            $table->mediumText('drone_desc')->nullable();
            $table->string('gimbal')->nullable();
            $table->mediumText('gimbal_desc')->nullable();
            $table->string('lens')->nullable();
            $table->mediumText('lens_desc')->nullable();
            $table->string('other')->nullable();
            $table->mediumText('other_desc')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}

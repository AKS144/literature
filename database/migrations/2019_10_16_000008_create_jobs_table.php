<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('company');
            $table->longText('address');
            $table->longText('description')->nullable();
            $table->longText('requirements')->nullable();
            $table->string('job_nature')->nullable();           
            $table->date('start_date');
            $table->date('end_date');
            $table->string('salary');
            $table->string('job_link');
            $table->timestamps();           
        });
    }
}

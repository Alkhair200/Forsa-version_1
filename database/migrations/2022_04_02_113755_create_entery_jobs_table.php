<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnteryJobsTable extends Migration
{

    public function up()
    {
        Schema::create('entery_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->longText('description');
            $table->string('cv');
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('company_id');
            $table->timestamps();

            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('commpany_info')->onDelete('cascade');

        });
    }


    public function down()
    {
        Schema::dropIfExists('entery_jobs');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\ForeignIdColumnDefinition;

class CreateJobsTable extends Migration
{

    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('type_job' ,100);
            $table->string('location' ,100);
            $table->tinyInteger('type_time');
            $table->decimal('amount', 8,2);
            $table->longText('description');
            $table->tinyInteger('status')->default(0);
            $table->unsignedBigInteger('commpany_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('commpany_id')->references('id')->on('commpany_infos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
        });
    }


    public function down()
    {
        Schema::dropIfExists('jubs');
    }
}

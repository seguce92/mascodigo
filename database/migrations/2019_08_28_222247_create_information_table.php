<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('medium')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('github')->nullable();
            $table->string('codepen')->nullable();
            $table->string('jsfiddle')->nullable();
            $table->string('gitlab')->nullable();
            $table->string('reddit')->nullable();
            $table->string('telegram')->nullable();
            $table->string('whatsapp')->nullable();
            
            $table->text('content')->nullable();

            $table->string('portlet')->default('image0.jpg');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('information');
    }
}

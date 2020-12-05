<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_id')->nullable();
            $table->integer('user_id');
            $table->text('subject')->nullable();
            $table->dateTime('start');
            $table->text('time_start');
            $table->dateTime('finish')->nullable();
            $table->text('time_finish')->nullable();
            $table->text('memo')->nullable();
            $table->integer('totaltime')->nullable();
            $table->text('today')->nullable();
            $table->text('status')->nullable();
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
        Schema::dropIfExists('studies');
    }
}

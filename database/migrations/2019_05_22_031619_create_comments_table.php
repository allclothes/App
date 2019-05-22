<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('to_store_id')->unsigned();
            $table->foreign('to_store_id')
            ->references('id')->on('store')
            ->onDelete('cascade');

            $table->integer('from_user_id')->unsigned();
            $table->foreign('from_user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');

            $table->string('username');
            $table->longText('message');


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
        Schema::dropIfExists('comments');
    }
}

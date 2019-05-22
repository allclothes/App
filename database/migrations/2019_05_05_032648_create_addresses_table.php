<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');

            $table->string('address');
            $table->string('number');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('neighborhood');
            $table->string('zip_code');

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
        Schema::dropIfExists('addresses');
    }
}

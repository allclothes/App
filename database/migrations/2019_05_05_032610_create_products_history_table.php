<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_history', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('store_id')->unsigned();
            $table->foreign('store_id')
                ->references('id')->on('store')
                ->onDelete('cascade');

            $table->bigInteger('address_id')->unsigned();
            $table->foreign('address_id')
                ->references('id')->on('address')
                ->onDelete('cascade');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');

            $table->string('status');

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
        Schema::dropIfExists('products_history');
    }
}

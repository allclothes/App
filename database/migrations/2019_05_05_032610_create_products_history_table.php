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

            $table->integer('user_seller_id')->unsigned();
            $table->foreign('user_seller_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('store_id')->unsigned();
            $table->foreign('store_id')
                ->references('id')->on('store')
                ->onDelete('cascade');

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')
                ->references('id')->on('products')
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

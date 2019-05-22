<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('store_id')->unsigned();
            $table->foreign('store_id')
                ->references('id')->on('store')
                ->onDelete('cascade');

            $table->string('name');
            $table->bigInteger('amount');
            $table->bigInteger('cost');
            $table->string('category');
            $table->longText('description');
            $table->string('images');
            $table->dateTime('deletedAt')->nullable();                    
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
        Schema::dropIfExists('products');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('username')->unique();
            $table->string('email')->unique();            
            $table->string('birthday');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('sex')->nullable();

            $table->string('storename')->nullable();
            
            $table->decimal('balance', 10, 2)->default(0);
            $table->string('cpf')->unique()->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_table', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('email')->unique();
            $table->rememberToken()->comment('хеш чего-то');
            $table->enum('variable',['true','false','null'])->comment('значения из списка');
            $table->boolean('bool')->comment('булевое значение');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('my_table');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->integer('films_id')->unsigned();
            $table->foreign('films_id')
                  ->references('id')->on('films')
                  ->onDelete('cascade');
            $table->integer('specializations_id')->unsigned();
            $table->foreign('specializations_id')
                  ->references('id')->on('specializations')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('relations');
    }
}

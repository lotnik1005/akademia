<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignTutorsToVisits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visits', function(Blueprint $table)
        {
            $table->integer('tutor_id')->unsigned()->change();
            $table->foreign('tutor_id', 'visits_tutor_id_foreign')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visits', function(Blueprint $table){
            $table->dropForeign('visits_tutor_id_foreign');
        });
    }
}

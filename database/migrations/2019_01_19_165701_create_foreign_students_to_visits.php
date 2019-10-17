<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignStudentsToVisits extends Migration
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
            $table->integer('student_id')->unsigned()->change();
            $table->foreign('student_id', 'visits_student_id_foreign')->references('id')->on('users');
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
            $table->dropForeign('visits_student_id_foreign');
        });
    }
}

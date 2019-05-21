<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudyRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('value');
            $table->string('star_status');
            $table->text('feedback')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('study_id')->unsigned();
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('study_id')->references('id')->on('studies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // $table->dropForeign('user_id');
        // $table->dropForeign('stud_id');
        Schema::dropIfExists('study_ratings');
    }
}

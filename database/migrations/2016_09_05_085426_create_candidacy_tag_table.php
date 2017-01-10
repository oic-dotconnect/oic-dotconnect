<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidacyTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('CANDIDACY_TAG', function (Blueprint $table) {
        $table->increments('id');

        $table->integer('tag_id')->unsigned()->index();
        $table->foreign('tag_id')->references('id')->on('TAG')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('CANDIDACY_TAG');
    }
}

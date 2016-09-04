<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EVENT', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->string('field');
            $table->string('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_at');
            $table->time('end_at');
            $table->string('place');
            $table->integer('capacity');
            $table->string('tag');
            $table->boolean('open');
            $table->date('open_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('EVENT');
    }
}

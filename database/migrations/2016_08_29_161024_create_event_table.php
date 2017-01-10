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
            $table->string('code',8)->unique();
            $table->string('name');
            $table->string('field')->nullable();
            $table->text('description')->nullable();
            $table->date('opening_date')->nullable();
            $table->time('start_at')->nullable();
            $table->time('end_at')->nullable();
            $table->string('place')->nullable();
            $table->integer('capacity')->nullable();
            $table->string('status')->default('close');
            $table->datetime('open_date')->nullable();
            $table->integer('organizer_id')->nullable();
            $table->date('recruit_start_date')->nullable();
            $table->date('recruit_end_date')->nullable();
            $table->time('recruit_start_time')->nullable();
            $table->time('recruit_end_time')->nullable();
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
        Schema::drop('EVENT');
    }
}

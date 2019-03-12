<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelsTable extends Migration 
{
	public function up()
	{
		Schema::create('channels', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->text('thumb');
            $table->text('desc');
            $table->integer('works_count')->unsigned()->default(0);
            $table->integer('status')->unsigned()->default(0);
            $table->integer('order')->unsigned()->default(0);
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('channels');
	}
}

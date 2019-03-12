<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration 
{
	public function up()
	{
		Schema::create('works', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->text('thumb');
            $table->integer('pid')->unsigned()->index();
            $table->integer('uid')->unsigned()->index();
            $table->integer('pop')->unsigned()->default(0);
            $table->integer('index_recom')->unsigned()->default(0);
            $table->integer('channel_recom')->unsigned()->default(0);
            $table->integer('status')->unsigned()->default(0);
            $table->integer('order')->unsigned()->default(0);
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('works');
	}
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThumbsTable extends Migration 
{
	public function up()
	{
		Schema::create('thumbs', function(Blueprint $table) {
            $table->increments('id');
            $table->string('path')->index();
            $table->integer('status')->unsigned()->default(0);
            $table->integer('order')->unsigned()->default(0);
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('thumbs');
	}
}

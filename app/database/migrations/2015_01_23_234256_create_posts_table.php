<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('posts', function(Blueprint $table)
            {
                $table->increments('id');
                $table->integer('user_id');
                $table->string('title');
                $table->string('excerpt');
                $table->text('body');
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
		Schema::drop('posts');
	}

}

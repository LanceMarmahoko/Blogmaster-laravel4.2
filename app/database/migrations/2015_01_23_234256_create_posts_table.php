<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(){
        Schema::create('posts', function(Blueprint $table){
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('user_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('excerpt');
            $table->boolean('publish_status');
            $table->text('image');
            $table->text('body');
            $table->softDeletes();
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

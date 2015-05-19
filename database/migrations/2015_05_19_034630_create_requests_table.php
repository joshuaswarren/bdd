<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('requests', function($t) {
            // auto increment id (primary key)
            $t->increments('id');
            $t->string('name');
            $t->string('reason');
            $t->string('uuid');
            $t->boolean('reviewed')->default(0);
            $t->boolean('approved')->default(0);
            // created_at, updated_at DATETIME
            $t->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('requests');
	}

}

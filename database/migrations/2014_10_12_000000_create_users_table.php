<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('name');
			$table->string('father_name');
			$table->string('gender');
			$table->date('date_of_birth');
			$table->integer('address');
			$table->string('email');
			$table->string('password');
			$table->string('profile_picture')->nullable();
			$table->string('tin')->nullable();
			$table->integer('role')->nullable();
			$table->text('activation_status')->nullable();
			$table->integer('created_by');
			$table->integer('updated_by')->nullable();
			$table->integer('deleted_by')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('users');
	}
}

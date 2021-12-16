<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('articles');
		Schema::create('articles', function (Blueprint $table) {
			$table->id();
			$table->string('judul');
			$table->text('deskripsi');
			$table->string('author');
			$table->string('category');
			$table->string('slug');
			$table->string('img')->default('/img/default.jpg');
			$table->integer('view')->default(0);
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
		Schema::dropIfExists('articles');
	}
}

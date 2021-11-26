<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInboxesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('inboxes');
		Schema::create('inboxes', function (Blueprint $table) {
			$table->id();
			$table->string('subject');
			$table->foreignId('pengirim')->references('id')->on('pegawai')->constrained();
			$table->foreignId('penerima')->nullable()->references('id')->on('pegawai')->constrained();
			$table->text('pesan');
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
		Schema::dropIfExists('inboxes');
	}
}

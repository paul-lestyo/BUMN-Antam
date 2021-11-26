<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('pegawai');
		Schema::create('pegawai', function (Blueprint $table) {
			$table->id();
			$table->string('nip');
			$table->string('nama_pegawai');
			$table->text('alamat_pegawai');
			$table->string('no_telp');
			$table->enum('golongan', ['1a', '1b', '2a', '2b']);
			$table->foreignId('user_id')->references('id')->on('users')->constrained();
			$table->foreignId('divisi_id')->references('id')->on('divisi')->constrained();
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
		Schema::dropIfExists('pegawai');
	}
}

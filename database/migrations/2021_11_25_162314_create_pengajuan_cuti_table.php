<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanCutiTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('pengajuan_cuti');
		Schema::create('pengajuan_cuti', function (Blueprint $table) {
			$table->id();
			$table->foreignId('pegawai_id');
			$table->date('started_at');
			$table->date('end_at');
			$table->string('status');
			$table->string('keterangan');
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
		Schema::dropIfExists('pengajuan_cuti');
	}
}

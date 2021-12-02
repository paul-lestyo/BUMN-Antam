<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
	public function index()
	{
		$data = [
			'title' => 'Pengelolaan Pegawai - Admin BUMN Antam',
			'pegawai' => Pegawai::with('divisi')->OrderBy('id', 'ASC')->get()
		];

		return view("admin.pegawai.index", $data);
	}

	public function edit(Pegawai $pegawai, $id)
	{
		$data = [
			'title' => 'Edit Data Pegawai - Admin BUMN Antam',
			'pegawai' => $pegawai->with('divisi')->where('id', $id)->get(),
			'divisi_pegawai' => Divisi::get(),

		];

		return view("admin.pegawai.edit", $data);
	}

	public function update(Request $request, Pegawai $pegawai, $id)
	{
		$validatedData = $request->validate([
			'nip' => 'required',
			'nama_pegawai' => 'required',
			'alamat_pegawai' => 'required',
			'no_telp' => 'required',
			'golongan' => 'required',
			'divisi_id' => 'required'
		]);

		$pegawai->where('id', $id)->update($validatedData);

		return redirect()->route('admin.pegawai.index')->with('sukses', 'Data Pegawai Berhasil Diperbarui!');
	}

	public function destroy(Pegawai $pegawai, $id)
	{

		$pegawai->where('id', $id)->delete();

		return redirect()->route('admin.pegawai.index')->with('sukses', 'Data Pegawai Berhasil Dihapus!');
	}
}

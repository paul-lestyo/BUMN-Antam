<?php

namespace App\Http\Controllers\Admin;

use App\Models\Presensi;
use App\Models\Pegawai;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    public function index()
	{
		$data = [
			'title' => "Presensi Pegawai - BUMN ANTAM",
			'pegawai' => Pegawai::get(),
		];


		return view("admin.presensi.index", $data);
	}

	public function show($id) {

		$data = [
			'title' => "Presensi Pegawai - BUMN ANTAM",
			'pegawai' => Pegawai::findOrFail($id),
			'presensi' => Presensi::where('pegawai_id', $id)->orderBy('created_at', 'DESC')->get()
		];

		return view("admin.presensi.show", $data);
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    public function index()
	{
		$presensi = Presensi::where('pegawai_id', Auth::user()->pegawai->id)->orderBy('created_at', 'DESC');
		$data = [
			'title' => "Presensi Pegawai - BUMN ANTAM",
			'pegawai' => $presensi->get(),
			'presensi' => $presensi->whereDate('created_at', Carbon::today())->first()
		];


		return view("admin.presensi.index", $data);
	}

	public function store()
	{
		$presensi = Presensi::where('pegawai_id', Auth::user()->pegawai->id)
			->whereDate('created_at', Carbon::today())->first();
		if (!$presensi) {
			Presensi::create(['pegawai_id' => Auth::user()->pegawai->id]);
		}

		return redirect()->route('admin.presensi.index');
	}

	public function edit()
	{
		$data = [
			'title' => "Jurnal Harian Pegawai - BUMN ANTAM"
		];

		return view("admin.presensi.jurnal", $data);
	}

	public function update(Request $request)
	{
		$validatedData = $request->validate([
			'jurnal' => 'required'
		]);

		$presensi = Presensi::where('pegawai_id', Auth::user()->pegawai->id)
			->whereDate('created_at', Carbon::today())->first();

		if ($presensi) {
			$presensi->update($validatedData);
		}

		return redirect()->route('admin.presensi.index');
	}
}

<?php

namespace App\Http\Controllers\Pegawai;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\PengajuanCuti;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PengajuanCutiController extends Controller
{
    public function index(){
        $data = [
            'title'=>'Pengajuan Cuti - Pegawai BUMN Antam',
            'pengajuan_cuti'=>PengajuanCuti::where("pegawai_id", Auth::user()->pegawai->id)->get()
        ];

        return view("pegawai.pengajuan-cuti.index", $data);
    }

    public function create()
	{
		$data = [
			'title' => 'Tambah Data Pengajuan Cuti - Pegawai BUMN Antam',
			'pegawai' => Pegawai::get(),
		];

        return view("pegawai.pengajuan-cuti.create", $data);
	}

    public function store(Request $request)
	{
		$validatedData = $request->validate([
			'started_at' => 'required|date|before_or_equal:end_at',
			'end_at' => 'required|date|after_or_equal:started_at',
			'keterangan' => 'required'
		]);
        $validatedData['pegawai_id'] = Auth::user()->pegawai->id;
        $validatedData['status'] = "On Progress";
      
		PengajuanCuti::create($validatedData);

        return redirect()->route('pegawai.pengajuan-cuti.index')->with('sukses', 'Data Pengajuan Cuti Berhasil Ditambah!');
	}
}

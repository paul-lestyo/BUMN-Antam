<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PengajuanCuti;
use App\Models\Pegawai;


class PengajuanCutiController extends Controller
{
    public function index(){
        $data = [
            'title'=>'Pengajuan Cuti - Admin BUMN Antam',
            'pengajuan_cuti'=>PengajuanCuti::with("pegawai.divisi")->get()
        ];

        return view("admin.pengajuan-cuti.index", $data);
    }

    public function create()
	{
		$data = [
			'title' => 'Tambah Data Pengajuan Cuti - Admin BUMN Antam',
			'pegawai' => Pegawai::get(),
		];

        return view("admin.pengajuan-cuti.create", $data);
	}

    public function store(Request $request)
	{
		$validatedData = $request->validate([
			'pegawai_id' => 'required|exists:pegawai,id',
			'started_at' => 'required|date',
			'end_at' => 'required|date',
			'keterangan' => 'required'
		]);
		$validatedData['status'] = "On Progress";
		PengajuanCuti::create($validatedData);

        return redirect()->route('admin.pengajuan-cuti.index')->with('sukses', 'Data Pengajuan Cuti Berhasil Ditambah!');
	}

    public function edit(Request $request, $id)
	{
		$data = [
			'title' => 'Edit Data Pengajuan Cuti - Admin BUMN Antam',
			'pengajuan_cuti' => PengajuanCuti::where('id', $id)->first(),
			'pegawai' => Pegawai::get(),

		];

		return view("admin.pengajuan-cuti.edit", $data);
	}

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
			'pegawai_id' => 'required|exists:pegawai,id',
			'started_at' => 'required|date',
			'end_at' => 'required|date',
			'status' => 'required',
			'keterangan' => 'required'
		]);

		$pengajuanCuti = PengajuanCuti::find($id);
		$pengajuanCuti->update($validatedData);

        return redirect()->route('admin.pengajuan-cuti.index')->with('sukses', 'Data Pengajuan Cuti Berhasil Diedit!');
    }

    public function destroy(Request $request, $id)
	{
		PengajuanCuti::find($id)->delete();

		return redirect()->route('admin.pengajuan-cuti.index')->with('sukses', 'Data Pengajuan Cuti Berhasil Dihapus!');
	}
}




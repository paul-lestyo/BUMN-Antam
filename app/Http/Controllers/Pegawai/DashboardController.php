<?php

namespace App\Http\Controllers\Pegawai;

use App\Models\Inbox;
use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Models\PengajuanCuti;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
	public function index()
	{
		$presensi = Presensi::where('pegawai_id', Auth::user()->pegawai->id);

		$chart_presensi = $presensi->get()->groupBy(function ($item) {
			return Carbon::parse($item->created_at)->format('M');
		})->map(function ($item) {
			return $item->count();
		});

		$data = [
			'presensi_bulan_ini' => $presensi->whereMonth('created_at', date('m'))->count(),
			'pengajuan_cuti' => PengajuanCuti::where('pegawai_id', Auth::user()->pegawai->id)->count(),
			'pesan_terkirim' => Inbox::where('pengirim', Auth::user()->pegawai->id)->count(),
			'pesan_diterima' => Inbox::where('penerima', Auth::user()->pegawai->id)->count(),
			'chart_presensi_label' => json_encode(array_keys($chart_presensi->toArray())),
			'chart_presensi_data' => json_encode(array_values($chart_presensi->toArray())),
		];

		return view('pegawai.dashboard', $data);
	}
}

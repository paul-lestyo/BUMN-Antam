<?php

namespace App\Http\Controllers\Admin;

use App\Models\View;
use App\Models\Divisi;
use App\Models\Article;
use App\Models\Pegawai;
use App\Models\Presensi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	public function index()
	{
		$date = View::orderBy('date')->get()->groupBy(function ($item) {
			return Carbon::parse($item->date)->format('M');
		})->map(function ($item) {
			return $item->sum(function ($item2) {
				return $item2->count;
			});
		});

		$presensi_tahun_ini = Presensi::orderBy('created_at')->whereYear('created_at', date("Y"))->get()->groupBy(function ($item) {
			return Carbon::parse($item->created_at)->format('M');
		})->map(function ($item) {
			return $item->count();
		});

		$presensi_tahun_kemarin = Presensi::orderBy('created_at')->whereYear('created_at', date("Y") - 1)->get()->groupBy(function ($item) {
			return Carbon::parse($item->created_at)->format('M');
		})->map(function ($item) {
			return $item->count();
		});


		$data = [
			'pegawai_count' => Pegawai::count(),
			'divisi_count' => Divisi::count(),
			'article_count' => Article::count(),
			'view_count' => View::sum('count'),
			'date' => json_encode(array_keys($date->toArray())),
			'view' => json_encode(array_values($date->toArray())),
			'presensi_tahun_ini' => $presensi_tahun_ini,
			'presensi_tahun_kemarin' => $presensi_tahun_kemarin
		];

		return view('admin.dashboard', $data);
	}
}

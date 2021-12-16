<?php

namespace App\Http\Controllers\Admin;

use App\Models\View;
use App\Models\Divisi;
use App\Models\Article;
use App\Models\Pegawai;
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


		$data = [
			'pegawai_count' => Pegawai::count(),
			'divisi_count' => Divisi::count(),
			'article_count' => Article::count(),
			'view_count' => View::sum('count'),
			'date' => json_encode(array_keys($date->toArray())),
			'view' => json_encode(array_values($date->toArray()))
		];

		return view('admin.dashboard', $data);
	}
}

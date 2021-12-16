<?php

namespace App\Http\Controllers\Pegawai;

use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    
    public function index()
    {   
        $presensi = Presensi::where('pegawai_id', Auth::user()->pegawai->id);
        $data = [
            'title' => "Presensi Pegawai - BUMN ANTAM",
            'pegawai' => $presensi->get(),
            'presensi' => $presensi->whereDate('created_at', Carbon::today())->first()
        ];

        
        return view("pegawai.presensi.index", $data);
    }

    public function store()
    {   
        $presensi = Presensi::where('pegawai_id', Auth::user()->pegawai->id)
                ->whereDate('created_at', Carbon::today())->first();
        if(!$presensi) {
            Presensi::create(['pegawai_id' => Auth::user()->pegawai->id]);
        }

        return redirect()->route('pegawai.presensi.index');
    }
}

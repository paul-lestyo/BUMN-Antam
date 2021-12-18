<?php

namespace App\Http\Controllers\Pegawai;

use App\Models\CekGaji;
use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CekGajiController extends Controller
{
    public function index(){
        $gaji = 0;
        $golongan = Auth::user()->pegawai->golongan;
        switch($golongan){
            case '1a':
                $gaji = 5000000;
            case '1b':
                $gaji = 4000000;
            case '2a':
                $gaji = 12000000;
            case '2b':
                $gaji = 10000000;
        }


        $presensi = Presensi::where('pegawai_id', Auth::user()->pegawai->id)
                            ->whereMonth('created_at', date('m'))->count();
        
        $persentase = $presensi / date('t');
        $sub_gaji = $persentase * $gaji;
        $pajak = $sub_gaji * 0.1;
        $total_gaji = $sub_gaji - $pajak;

        $data = [
            'title'=>'Cek Gaji - Pegawai BUMN Antam',
            'gaji' => $gaji,
            'persentase' => $persentase,
            'sub_gaji' => $sub_gaji,
            'pajak' => $pajak,
            'total_gaji' => $total_gaji,
        ];

        return view("pegawai.cek-gaji.index", $data);
    }
}

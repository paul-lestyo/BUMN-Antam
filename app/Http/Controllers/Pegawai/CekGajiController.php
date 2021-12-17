<?php

namespace App\Http\Controllers\Pegawai;

use Illuminate\Http\Request;
use App\Models\CekGaji;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CekGajiController extends Controller
{
    public function index(){
        $data = [
            'title'=>'Cek Gaji - Pegawai BUMN Antam',
        ];

        return view("pegawai.cek-gaji.index", $data);
    }
}

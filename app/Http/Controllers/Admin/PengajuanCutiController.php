<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PengajuanCuti;

class PengajuanCutiController extends Controller
{
    public function index(){
        $data = [
            'title'=>'Pengajuan Cuti - Admin BUMN Antam',
            'pengajuan_cuti'=>PengajuanCuti::get()
        ];


        return view("admin.pengajuan-cuti.index", $data);
    }
}




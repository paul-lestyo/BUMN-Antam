<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(){
        $data = [
            'title'=>'Pengelolaan Pegawai - Admin BUMN Antam'
        ];

        return view("admin.pegawai.index", $data);
    }
}
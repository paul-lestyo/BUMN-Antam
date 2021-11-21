<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $data = [
            'title'=>'Kelola Divisi - Admin BUMN Antam',
            'divisi'=>Divisi::OrderBy('nama_divisi','ASC')->get()
        ];

        return view("admin.divisi.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title'=>'Tambah - Admin BUMN Antam'
        ];

        return view("admin.divisi.create",$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_divisi'=>'required|max:255'
        ]);

        Divisi::create($validatedData);

        return redirect()->route('admin.divisi.index')->with('sukses','Data Divisi Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function show(Divisi $divisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Divisi $divisi)
    {
        $data = [
            'title'=>'Edit Divisi - Admin BUMN Antam',
            'divisi'=>$divisi
        ];

        return view("admin.divisi.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Divisi $divisi)
    {
        $validatedData = $request->validate([
            'nama_divisi'=>'required|max:255'
        ]);

        $divisi->update($validatedData);

        return redirect()->route('admin.divisi.index')->with('sukses','Data Divisi Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Divisi $divisi)
    {
        $divisi->delete();

        return redirect()->route('admin.divisi.index')->with('sukses','Data Divisi Berhasil Dihapus!');
    }
}

<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Inbox;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Kelola Pesan - Pegawai BUMN Antam',
            'pesan' => Inbox::orderBy('created_at', 'DESC')->get()
        ];

        return view('pegawai.inbox.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Kirim Pesan - Pegawai BUMN Antam',
        ];

        return view('pegawai.inbox.create', $data);
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
            'subject' => 'required|max:255',
            'pesan' => 'required'
        ]);

        $validatedData['pengirim'] = auth()->user()->pegawai->id;

        Inbox::create($validatedData);

        return redirect()->route('pegawai.inbox.index')->with('sukses', 'Pesan Berhasil Dikirimkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function show(Inbox $inbox)
    {
        $data = [
            'title' => "Pesan $inbox->subject - Pegawai BUMN Antam",
            'inbox' => $inbox
        ];

        return view('pegawai.inbox.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function edit(Inbox $inbox)
    {
        $data = [
            'title' => 'Edit Pesan - Pegawai BUMN Antam',
            'inbox' => $inbox
        ];

        return view('pegawai.inbox.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inbox $inbox)
    {
        $validatedData = $request->validate([
            'subject' => 'required|max:255',
            'pesan' => 'required'
        ]);

        $validatedData['pengirim'] = auth()->user()->pegawai->id;

        $inbox->update($validatedData);

        return redirect()->route('pegawai.inbox.index')->with('sukses', 'Pesan Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inbox $inbox)
    {
       $inbox->delete();

       return redirect()->route('pegawai.inbox.index')->with('sukses', 'Pesan Berhasil Dihapus!');
    }
}

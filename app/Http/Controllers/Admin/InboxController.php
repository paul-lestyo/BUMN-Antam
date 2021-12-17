<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inbox;

class InboxController extends Controller
{
    public function index()
	{
		$data = [
			'title' => "Inbox - All Data",
			'pesan' => Inbox::with('dataPengirim')->whereNull('penerima')->get()
		];

		return view('admin.inbox.index', $data);
	}

	public function send()
	{
		$data = [
			'title' => "Inbox - All Data",
			'pesan' => Inbox::with(['dataPengirim', 'dataPenerima'])->whereNotNull('penerima')->get()
		];

		return view('admin.inbox.send', $data);
	}

	public function showSend($id)
	{
		$data = [
			'title' => "Inbox - Show data",
			'inbox' => Inbox::findOrFail($id),
		];

		return view('admin.inbox.showSend', $data);
	}

	public function show($id)
	{
		$data = [
			'title' => "Inbox - Show data",
			'inbox' => Inbox::findOrFail($id),
		];


		return view('admin.inbox.show', $data);
	}

	public function create($id)
	{
		$data = [
			'title' => "Inbox - Balas Pesan",
			'inbox' => Inbox::with('dataPengirim')->findOrFail($id)
		];

		return view('admin.inbox.create', $data);
	}

	public function store(Request $request, $id)
	{
		$inbox = Inbox::findOrFail($id);

		$validatedData = $request->validate([
			'subject' => 'required|max:255',
			'pesan' => 'required'
		]);

		$validatedData['subject'] = "[ Reply | $inbox->subject ] - " . $validatedData['subject'];
		$validatedData['pengirim'] = auth()->user()->pegawai->id;
		$validatedData['penerima'] = $inbox->pengirim;

		Inbox::create($validatedData);

		return redirect()->route('admin.inbox.index')->with('sukses', 'Pesan Berhasil Dikirimkan!');
	}
}
<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
	public function index()
	{
		$data = [
			"title" => "Admin - Edit Page About",
			"contact" => Contact::first(),
		];

		return view('admin.page.contact', $data);
	}

	public function update(Request $request)
	{
		$validatedData = $request->validate([
			'deskripsi' => 'required',
			'iframe' => 'required'
		]);

		Contact::first()->update($validatedData);
		return redirect()->route('admin.contact.index')->with('sukses', 'Data Page Contact Berhasil Diubah!');
	}
}

<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
	public function index()
	{
		$data = [
			'title' => "Admin - Edit Page About",
			'about' => About::first()
		];
		return view('admin.page.about', $data);
	}

	public function update(Request $request)
	{
		$validatedData = $request->validate([
			'deskripsi' => 'required'
		]);

		About::first()->update($validatedData);
		return redirect()->route('admin.about.index')->with('sukses', 'Data Page About Berhasil Diubah!');
	}
}

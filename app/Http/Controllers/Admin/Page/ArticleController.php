<?php

namespace App\Http\Controllers\Admin\Page;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Services\UploadService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
	public function index()
	{
		$data = [
			"title" => "Admin - Article",
			"articles" => Article::with('views')->get()
		];
		return view('admin.page.article.index', $data);
	}

	public function create()
	{
		$data = [
			"title" => "Admin - Add Article",
		];

		return view('admin.page.article.create', $data);
	}

	public function store(Request $request)
	{
		$validatedData = $request->validate([
			'judul' => 'required|max:255',
			'deskripsi' => 'required',
			'author' => 'required',
			'category' => 'required',
			'img' => 'mimes:png,jpg,jpeg|max:1024'
		]);

		if (isset($request->img)) {
			$uploadImage = (new UploadService)->uploadToPublicPath($request->img, '/images/article/');
			$validatedData['img'] = $uploadImage;
		}

		Article::create($validatedData);

		return redirect()->route('admin.article.index')->with('sukses', 'Data Article Berhasil Ditambahkan!');
	}

	public function edit($id)
	{
		$data = [
			'title' => 'Admin - Edit Article',
			'article' => Article::findOrFail($id)
		];

		return view('admin.page.article.edit', $data);
	}

	public function update(Request $request, $id)
	{
		$article = Article::findOrFail($id);
		$validatedData = $request->validate([
			'judul' => 'required|max:255',
			'deskripsi' => 'required',
			'author' => 'required',
			'category' => 'required',
			'img' => 'mimes:png,jpg,jpeg|max:1024'
		]);

		if (isset($request->img)) {
			$uploadImage = (new UploadService)->uploadToPublicPath($request->img, '/images/article/');
			$validatedData['img'] = $uploadImage;
			if ($article->img !== "/img/default.jpg") {
				File::delete(public_path($article->img));
			}
		}

		$article->update($validatedData);

		return redirect()->route('admin.article.index')->with('sukses', 'Data Article Berhasil Diubah!');
	}

	public function destroy($id)
	{
		$article = Article::findOrFail($id);
		if ($article->img !== "/img/default.jpg") {
			File::delete(public_path($article->img));
		}
		$article->delete();

		return redirect()->route('admin.article.index')->with('sukses', 'Data Article Berhasil Dihapus!');
	}
}

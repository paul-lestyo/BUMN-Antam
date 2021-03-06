<?php

namespace App\Http\Controllers;

use App\Models\View;
use App\Models\About;
use App\Models\Article;
use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
	{
		$data = [
			'title' => 'Home | BUMN Antam'
		];

		return view('home', $data);
	}

	public function about()
	{
		$data = [
			'title' => 'About Us | BUMN Antam',
			'about' => About::first()
		];

		return view('about', $data);
	}

	public function article()
	{
		$data = [
			'title' => 'Article | BUMN Antam',
			'articles' => Article::orderBy('created_at', 'DESC')->paginate(6)
		];

		return view('article', $data);
	}

	public function detailArticle($id)
	{
		$article = Article::where('id', $id)->firstOrFail();
		$view = View::firstOrNew(['article_id' => $article->id, 'date' => date('Y-m-d')]);
		$view->count = $view->count + 1;
		$view->date = date('Y-m-d');
		$view->save();

		$data = [
			'title' => "$article->judul | Article BUMN Antam",
			'article' => $article
		];

		return view('detail-article', $data);
	}

	public function contact()
	{
		$data = [
			'title' => 'Contact Us | BUMN Antam',
			'contact' => Contact::first()
		];

		return view('contact', $data);
	}
}

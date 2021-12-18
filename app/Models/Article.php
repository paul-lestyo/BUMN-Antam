<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
	use HasFactory;

	protected $guarded = ['id'];

	public function setJudulAttribute($value)
	{
		$this->attributes['judul'] = $value;
		$this->attributes['slug'] = Str::slug($value);
	}

	public function views()
	{
		return $this->hasMany(View::class);
	}
}

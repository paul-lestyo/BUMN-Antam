<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
	use HasFactory;

	protected $guarded = ['id'];
	protected $table = "pegawai";

	public function divisi()
	{
		return $this->belongsTo(Divisi::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function inbox()
	{
		return $this->hasMany(Inbox::class);
	}
}

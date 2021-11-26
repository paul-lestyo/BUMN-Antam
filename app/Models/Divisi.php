<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
	use HasFactory;
	protected $table = "divisi";
	protected $guarded = ['id'];

	public function pegawai()
	{
		return $this->hasMany(Pegawai::class);
	}
}

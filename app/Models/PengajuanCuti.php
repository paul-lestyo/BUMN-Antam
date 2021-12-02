<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanCuti extends Model
{
    use HasFactory;
    protected $table = "pengajuan_cuti";
    protected $fillable = ['pegawai_id','started_at','end_at','keterangan'];
    
    public function pegawai()
	{
		return $this->belongsTo(Pegawai::class);
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function dataPengirim()
    {
        return $this->belongsTo(Pegawai::class, 'pengirim', 'id');
    }

    public function dataPenerima()
    {
        return $this->belongsTo(Pegawai::class, 'penerima', 'id');
    }

    public function hasReply($id) 
    {
        $inbox = Inbox::findOrFail($id);
        return $this->where('penerima', $inbox->id)->where('subject', 'LIKE', "[ Reply | $inbox->subject ]%")->first();
    }
}

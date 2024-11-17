<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanHarian extends Model
{
    use HasFactory;

    protected $fillable = ['angkatan_id', 'tanggal', 'kegiatan', 'kondisi_bebek', 'keterangan'];

    public function angkatan()
    {
        return $this->belongsTo(Angkatan::class);
    }

    protected $casts = [
        'tanggal' => 'date',
    ];


    public function getTanggalFormattedAttribute()
    {
        return $this->tanggal->locale('id')->isoFormat('dddd, DD-MM-YYYY');
    }
}

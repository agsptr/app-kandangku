<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $fillable = ['angkatan_id', 'tanggal', 'jenis_pengeluaran', 'jumlah_pengeluaran', 'keterangan'];

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

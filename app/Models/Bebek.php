<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bebek extends Model
{
    use HasFactory;

    protected $fillable = [
        'angkatan_id',
        'tanggal_masuk',
        'jumlah_awal',
        'asal_bibit',
        'jenis_bebek',
        'usia_masuk',
        'kandang',
    ];

    public function angkatan()
    {
        return $this->belongsTo(Angkatan::class);
    }

    protected $casts = [
        'tanggal_masuk' => 'date',
    ];

    public function getTanggalMasukFormattedAttribute()
    {
        return $this->tanggal_masuk->locale('id')->isoFormat('dddd, DD-MM-YYYY');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendapatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'angkatan_id',
        'tanggal',
        'jumlah_terjual',
        'berat_total',
        'harga_per_kg',
        'total_pendapatan',
        'pembeli',
        'keterangan',
    ];

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

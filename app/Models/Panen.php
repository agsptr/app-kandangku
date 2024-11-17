<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panen extends Model
{
    use HasFactory;
    protected $fillable = ['angkatan_id', 'tanggal_panen', 'jumlah_panen', 'berat_panen', 'keterangan'];

    public function angkatan()
    {
        return $this->belongsTo(Angkatan::class);
    }

    protected $casts = [
        'tanggal_panen' => 'date',
    ];

    public function getTanggalFormattedAttribute()
    {
        return $this->tanggal->locale('id')->isoFormat('dddd, DD-MM-YYYY');
    }
}

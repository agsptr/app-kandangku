<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angkatan extends Model
{
    use HasFactory;

    protected $table = 'angkatans';

    protected $fillable = [
        'nama_angkatan',
        'tanggal_mulai',
        'tanggal_selesai',
        'keterangan',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($angkatan) {
            if ($angkatan->tanggal_selesai && $angkatan->tanggal_mulai) {
                $angkatan->usia_panen = $angkatan->tanggal_mulai->diffInDays($angkatan->tanggal_selesai);
            }
        });
    }

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function getTanggalSelesaiFormattedAttribute()
    {
        return $this->tanggal_selesai
            ? $this->tanggal_selesai->locale('id')->isoFormat('dddd, DD-MM-YYYY')
            : '<span class="belum-diangkat">Belum diangkat</span>';
    }

    public function bebeks()
    {
        return $this->hasMany(Bebek::class);
    }

    public function pakans()
    {
        return $this->hasMany(Pakan::class);
    }

    public function kematians()
    {
        return $this->hasMany(Kematian::class);
    }

    // public function kematians()
    // {
    //     return $this->hasManyThrough(Kematian::class, Bebek::class);
    // }
}

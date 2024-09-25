<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;
    protected $table = 'pemeriksaan';
    protected $fillable = [
        'kategori_id','pendaftaran_id', 'nama_pasien', 'keluhan', 'diagnosa', 'hasil_pemeriksaan','tglperiksa', 'jenis_pasien', 'total_pembayaran'
    ];

    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    // Relasi ke kategori
    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}

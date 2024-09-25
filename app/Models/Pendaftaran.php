<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran';
    protected $fillable = [
        'kategori_id','nama', 'tanggal_lahir', 'jenis_kelamin', 'no_telp', 'alamat','foto', 'layanan', 'tanggal_kunjungan', 'waktu_kunjungan', 'jenis_pasien', 'nik', 'bpjs_no', 'faskes', 'rujukan', 'keluhan',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function pemeriksaan()
    {
        return $this->hasMany(Pemeriksaan::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $fillable = ['id','nama','deskripsi','gambar'];


    public function pemeriksaan()
    {
        return $this->hasMany(Pemeriksaan::class);
    }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class);
    }
}


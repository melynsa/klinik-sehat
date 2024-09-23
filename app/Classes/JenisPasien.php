<?php

// app/Classes/JenisPasien.php
namespace App\Classes;

use App\Interfaces\JenisPasienInterface;

class JenisPasien implements JenisPasienInterface
{
    protected $jenis;

    public function __construct($jenis)
    {
        $this->jenis = $jenis;
    }

    public function jenis($total_pembayaran)
    {
        if ($this->jenis === 'BPJS' && $total_pembayaran >= 500000) {
            return $total_pembayaran * 0.4; // Potongan 60%
        } elseif ($this->jenis === 'UMUM' && $total_pembayaran < 500000) {
            return $total_pembayaran * 0.9; // Diskon 10%
        }
        return $total_pembayaran; // Tidak ada diskon
    }
}

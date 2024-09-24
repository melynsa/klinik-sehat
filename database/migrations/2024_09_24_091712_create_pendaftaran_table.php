<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['LAKI-LAKI', 'PEREMPUAN']);
            $table->string('no_telp');
            $table->text('alamat');
            $table->string('foto');
            $table->string('layanan');
            $table->date('tanggal_kunjungan');
            $table->time('waktu_kunjungan');
            $table->enum('jenis_pasien', ['UMUM', 'BPJS']);
            $table->string('nik')->nullable();
            $table->string('bpjs_no')->nullable();
            $table->string('faskes')->nullable();
            $table->string('rujukan')->nullable();
            $table->text('keluhan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};

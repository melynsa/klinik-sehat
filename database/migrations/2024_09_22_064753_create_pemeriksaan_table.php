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
        Schema::create('pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_id'); // Foreign key to kategori
            $table->unsignedBigInteger('pendaftaran_id'); // Foreign key to pendaftaran
            $table->string('nama_pasien'); // Can be optional if you want to fetch from pendaftaran
            $table->string('keluhan');
            $table->string('diagnosa');
            $table->text('hasil_pemeriksaan');
            $table->date('tglperiksa');
            $table->enum('jenis_pasien', ['BPJS', 'UMUM']);
            $table->decimal('total_pembayaran', 10, 2);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
            $table->foreign('pendaftaran_id')->references('id')->on('pendaftaran')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan');
    }
};

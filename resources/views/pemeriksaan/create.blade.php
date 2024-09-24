@extends('layouts.petugas')
@section('form')


<div>
    <h2 class="text-center" style="color: lightskyblue; margin-bottom: 50px">Form {{ $kategoridipilih->nama }} Pasien</h2>


    <form action="{{ route('pemeriksaan.store') }}" method="post">
        @csrf
        {{-- <div class="mb-3">
            <label for="kategori" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div> --}}
        <!-- Input Kategori (Disable) -->
        <div class="form-group">
            <label for="kategori">Kategori Pemeriksaan</label>
            <input type="text" id="kategori" class="form-control" value="{{ $kategoridipilih->nama }}" disabled>
            <!-- Menyimpan kategori_id yang dipilih sebagai hidden input -->
            <input type="hidden" name="kategori_id" value="{{ $kategoridipilih->id }}">
        </div><br>

        <label for="nama_pasien">Nama Pasien</label><br>
        <input type="text" name="nama_pasien" class="form-control" id="nama_pasien" value="{{ old('nama_pasien') }}"><br>

        <label for="keluhan">Keluhan</label><br>
        <input type="text" name="keluhan" class="form-control" id="keluhan" value="{{ old('keluhan') }}"><br>

        <label for="diagnosa">Diagnosa</label><br>
        <input type="text" name="diagnosa" class="form-control" id="diagnosa" value="{{ old('diagnosa') }}"><br>

        <label for="hasil_pemeriksaan">Hasil Pemeriksaan & Resep</label><br>
        <textarea name="hasil_pemeriksaan" class="form-control" id="hasil_pemeriksaan" cols="20" rows="10">{{ old('hasil_pemeriksaan') }}</textarea><br>

        <label for="tglperiksa">Tanggal Pemeriksaan</label><br>
        <input type="date" name="tglperiksa" class="form-control" id="tglperiksa" value="{{ old('tglperiksa') }}"><br>

        <!-- Input Jenis Pasien dengan Radio Button -->
        <label for="jenis_pasien">Jenis Pasien</label><br>
        <input type="radio" name="jenis_pasien" value="BPJS" id="bpjs" checked> BPJS
        <input type="radio" name="jenis_pasien" value="UMUM" id="umum"> UMUM<br><br>

        <!-- Input Pembayaran Awal -->
        <label for="pembayaran_awal">Pembayaran Awal</label><br>
        <input type="number" class="form-control" name="pembayaran_awal" id="pembayaran_awal" step="0.01"><br>

        <!-- Input Total Pembayaran (Readonly) -->
        <label for="total_pembayaran">Total Pembayaran</label><br>
        <input type="number" class="form-control" name="total_pembayaran" id="total_pembayaran" step="0.01" readonly><br><br>

        <button type="submit" class="btn btn-primary">Cetak</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const pembayaranAwalInput = document.getElementById('pembayaran_awal');
        const jenisPasienInputs = document.querySelectorAll('input[name="jenis_pasien"]');
        const totalPembayaranInput = document.getElementById('total_pembayaran');

        function formatRupiah(angka) {
            return 'RP ' + parseFloat(angka).toLocaleString('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        }

        function hitungTotalPembayaran() {
            const pembayaranAwal = parseFloat(pembayaranAwalInput.value) || 0;
            let totalPembayaran = pembayaranAwal;
            const jenisPasien = document.querySelector('input[name="jenis_pasien"]:checked').value;

            if (jenisPasien === 'BPJS' && pembayaranAwal >= 500000) {
                totalPembayaran = pembayaranAwal * 0.4;
            } else if (jenisPasien === 'UMUM' && pembayaranAwal < 500000) {
                totalPembayaran = pembayaranAwal * 0.9;
            }

            totalPembayaranInput.value = totalPembayaran.toFixed(2);
        }

        pembayaranAwalInput.addEventListener('input', hitungTotalPembayaran);
        jenisPasienInputs.forEach(input => {
            input.addEventListener('change', hitungTotalPembayaran);
        });
    });
</script>
@endsection

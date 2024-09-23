
<div class="container">
    <h1>Invoice Pemeriksaan</h1>
    <p>Nama Pasien: {{ $pemeriksaan->nama_pasien }}</p>
    <p>Keluhan: {{ $pemeriksaan->keluhan }}</p>
    <p>Diagnosa: {{ $pemeriksaan->diagnosa }}</p>
    <p>Hasil Pemeriksaan: {{ $pemeriksaan->hasil_pemeriksaan }}</p>
    <p>Jenis Pasien: {{ $pemeriksaan->jenis_pasien }}</p>
    <p>Total Pembayaran: Rp. {{ number_format($pemeriksaan->total_pembayaran, 2, ',', '.') }}</p>

    <button onclick="window.print()">Print</button>
    <a href="{{ route('invoice.pdf', $pemeriksaan->id) }}" class="btn btn-secondary">Cetak PDF</a>
</div>

<script>
    document.getElementById('btn-pdf').onclick = function() {
        // Tambahkan logika untuk membuat PDF menggunakan library seperti jsPDF atau mPDF
    };
</script>

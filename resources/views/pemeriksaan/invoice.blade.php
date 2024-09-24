
<div class="container" style="padding: 15px 100px 150px 100px; border: 2px solid black;margin: 20px">
    <div style="display: flex; justify-content: space-between">
        <h1>Klinik Sehat</h1>
        <h2>Invoice Pemeriksaan</h2>
    </div>
    <div style=" border-bottom: 1px solid black"></div>
    <div style="display: flex; justify-content: space-around">
        <div>
            <p>Nama Pasien: {{ $pemeriksaan->nama_pasien }}</p>
            <p>Keluhan: {{ $pemeriksaan->keluhan }}</p>
            <p>Diagnosa: {{ $pemeriksaan->diagnosa }}</p>
            <p>Jenis Pasien: {{ $pemeriksaan->jenis_pasien }}</p>
        </div>
        <p>Hasil Pemeriksaan: {{ $pemeriksaan->hasil_pemeriksaan }}</p>
    </div>
    <div style=" border-bottom: 1px solid black"></div>
    <div style="display: flex; justify-content: space-around">
        <p>Total Pembayaran:</p>
        <p>Rp. {{ number_format($pemeriksaan->total_pembayaran, 2, ',', '.') }}</p>
    </div>

</div>
<div style="display: flex; justify-content: center;">
    <a href="{{ route('invoice.pdf', $pemeriksaan->id) }}" class="btn btn-secondary"><button>Cetak PDF</button></a>
    <button onclick="window.print()" style="margin-left: 20px">Print</button>
</div>

<script>
    document.getElementById('btn-pdf').onclick = function() {
        // Tambahkan logika untuk membuat PDF menggunakan library seperti jsPDF atau mPDF
    };
</script>

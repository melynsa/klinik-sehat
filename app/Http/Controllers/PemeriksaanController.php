<?php

namespace App\Http\Controllers;

use App\Classes\JenisPasien;
use App\Models\Kategori;
use App\Models\Pemeriksaan;
use App\Models\Pendaftaran;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;

class PemeriksaanController extends Controller
{
    // masuk ke form pemeriksaan berdasarkan id kategori
    public function tambahperiksabyid(Request $request, $kategori_id)
    {

        // Mengambil data kategori berdasarkan id
        $kategoridipilih = Kategori::findOrFail($kategori_id);  // Jika tidak ditemukan, akan memunculkan 404 error
        $pendaftaran = Pendaftaran::all();  // Ambil semua data pasien dari tabel pendaftaran
        $kategori = Kategori::all();  // Ambil semua kategori untuk dropdown

        return view('pemeriksaan.create', compact('kategori', 'kategoridipilih', 'pendaftaran'));
    }

    // menampilkan tabel data kategori
    public function tampilkategori()
    {
        $pemeriksaan = Pemeriksaan::with('kategori')->get();
        return view('pemeriksaan.index', compact('pemeriksaan'));
    }



    // menyimpan hasil data tambah kategori
    public function simpanpemeriksaan(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'nama_pasien' => 'required',
            'keluhan' => 'required',
            'diagnosa' => 'required',
            'hasil_pemeriksaan' => 'required',
            'tglperiksa' => 'required|date',
            'jenis_pasien' => 'required|in:BPJS,UMUM',
            'total_pembayaran' => 'required|numeric',
        ]);

        // Logika diskon
        $pembayaranAwal = $request->pembayaran_awal;
        $jenisPasien = $request->jenis_pasien;
        $totalPembayaran = $pembayaranAwal;

        if ($jenisPasien === 'BPJS' && $pembayaranAwal >= 500000) {
            $totalPembayaran = $pembayaranAwal * 0.4; // Potongan 60%
        } elseif ($jenisPasien === 'UMUM' && $pembayaranAwal < 500000) {
            $totalPembayaran = $pembayaranAwal * 0.9; // Diskon 10%
        }

        // Simpan data ke database
        $pemeriksaan = Pemeriksaan::create([
            'kategori_id' => $request->kategori_id,
            'nama_pasien' => $request->nama_pasien,
            'keluhan' => $request->keluhan,
            'diagnosa' => $request->diagnosa,
            'hasil_pemeriksaan' => $request->hasil_pemeriksaan,
            'jenis_pasien' => $request->jenis_pasien,
            'tglperiksa' => $request->tglperiksa,
            'total_pembayaran' => $totalPembayaran, // Menyimpan total pembayaran yang sudah didiskon
        ]);

        // return redirect()->route('pemeriksaan.index')->with('success', 'Pemeriksaan berhasil ditambahkan.');
        return redirect()->route('invoice', ['id' => $pemeriksaan->id])->with('success', 'Pemeriksaan berhasil ditambahkan.');
    }

    // hapus data pemeriksaan
    public function hapuspemeriksaan($id)
    {
        $pemeriksaan = Pemeriksaan::findOrFail($id);
        $pemeriksaan->delete();

        return redirect()->route('pemeriksaan.index')->with('success', 'Pemeriksaan berhasil dihapus.');
    }

    // menampilkan invoice hasil pemeriksaan
    public function showInvoice($id)
    {
        $pemeriksaan = Pemeriksaan::with('kategori')->findOrFail($id);
        return view('pemeriksaan.invoice', compact('pemeriksaan'));
    }

    // ubah ke pdf
    public function generatePdf($id)
    {
        $pemeriksaan = Pemeriksaan::with('kategori')->findOrFail($id);

        // Instansiasi dompdf
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);

        // Load view ke string
        $html = view('pemeriksaan.invoice', compact('pemeriksaan'))->render();
        $dompdf->loadHtml($html);

        // Set ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'landscape');

        // Render PDF
        $dompdf->render();

        // Output ke browser
        return $dompdf->stream('invoice.pdf');
    }
}

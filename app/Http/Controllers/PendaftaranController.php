<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{

    public function daftarpasien()
    {
        return view('pendaftaran');
    }

    public function tampildaftar()
    {
        $judul = "Form Tambah Data daftar Baru";
        $daftar = Pendaftaran::all();
        return view('daftar.index', compact('daftar', 'judul'));
    }

    // menyimpan hasil penambahan kategori
    public function simpandaftar(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'foto' => 'nullable|mimes:jpeg,png,jpg',
            'layanan' => 'required',
            'tanggal_kunjungan' => 'required|date',
            'waktu_kunjungan' => 'required',
            'jenis_pasien' => 'required',
            'nik' => 'nullable',
            'bpjs_no' => 'nullable',
            'faskes' => 'nullable',
            'rujukan' => 'nullable',
            'keluhan' => 'required',
        ]);

        $data = new Pendaftaran();
        $data->nama = $request->nama;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->no_telp = $request->no_telp;
        $data->alamat = $request->alamat;
        $data->layanan = $request->layanan;
        $data->tanggal_kunjungan = $request->tanggal_kunjungan;
        $data->waktu_kunjungan = $request->waktu_kunjungan;
        $data->jenis_pasien = $request->jenis_pasien;
        $data->nik = $request->nik;
        $data->bpjs_no = $request->bpjs_no;
        $data->faskes = $request->faskes;
        $data->rujukan = $request->rujukan;
        $data->keluhan = $request->keluhan;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namafile = time() . '_' . $file->getClientOriginalName();
            $filepath = 'pasien/foto';

            $file->move(public_path($filepath), $namafile);
            $data->foto = $namafile;
        }

        $data->save();

        return redirect()->route('pasien.daftar')->with('success', 'daftar telah ditambahkan.');
    }

    // Method untuk update kategori
    // public function updatedaftar(Request $request, $id)
    // {

    //     $request->validate([
    //         'nama' => 'required',
    //         'tanggal_lahir' => 'required|date',
    //         'jenis_kelamin' => 'required',
    //         'no_telp' => 'required',
    //         'alamat' => 'required',
    //         'foto' => 'nullable|mimes:jpeg,png,jpg',
    //         'layanan' => 'required',
    //         'tanggal_kunjungan' => 'required|date',
    //         'waktu_kunjungan' => 'required',
    //         'jenis_pasien' => 'required',
    //         'nik' => 'nullable',
    //         'bpjs_no' => 'nullable',
    //         'faskes' => 'nullable',
    //         'rujukan' => 'nullable',
    //         'keluhan' => 'required',
    //     ]);

    //     $data = Pendaftaran::findOrFail($id);
    //     $data->nama = $request->nama;
    //     $data->tanggal_lahir = $request->tanggal_lahir;
    //     $data->jenis_kelamin = $request->jenis_kelamin;
    //     $data->no_telp = $request->no_telp;
    //     $data->alamat = $request->alamat;
    //     $data->layanan = $request->layanan;
    //     $data->tanggal_kunjungan = $request->tanggal_kunjungan;
    //     $data->waktu_kunjungan = $request->waktu_kunjungan;
    //     $data->jenis_pasien = $request->jenis_pasien;
    //     $data->nik = $request->nik;
    //     $data->bpjs_no = $request->bpjs_no;
    //     $data->faskes = $request->faskes;
    //     $data->rujukan = $request->rujukan;
    //     $data->keluhan = $request->keluhan;

    //     if ($request->hasFile('foto')) {
    //         // Hapus foto lama jika ada
    //         if ($data->foto && file_exists(public_path('pasien/foto/' . $data->foto))) {
    //             unlink(public_path('pasien/foto/' . $data->foto));
    //         }

    //         $file = $request->file('foto');
    //         $namafile = time() . '_' . $file->getClientOriginalName();
    //         $filepath = 'pasien/foto';

    //         $file->move(public_path($filepath), $namafile);
    //         $data->foto = $namafile;
    //     }

    //     $data->save();

    //     return redirect()->route('tampil.daftar')->with('success', 'daftar telah diperbarui.');
    // }

    // Method untuk menghapus daftar
    public function deletedaftar($id)
    {
        $daftar = Pendaftaran::findOrFail($id);

        if ($daftar->foto && file_exists(public_path('pasien/foto/' . $daftar->foto))) {
            unlink(public_path('pasien/foto/' . $daftar->foto));
        }

        $daftar->delete();

        return redirect()->route('tampil.daftar')->with('success', 'daftar telah dihapus.');
    }
}

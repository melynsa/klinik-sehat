<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{

    public function tampildokter()
    {
        $judul = "Form Tambah Data dokter Baru";
        $title = "Form Edit Data dokter ";
        $dokter = Dokter::all();
        return view('dokter.index', compact('dokter', 'judul', 'title'));
    }

    // menyimpan hasil penambahan kategori
    public function simpandokter(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'jenis' => 'required',
            'twiter' => 'required',
            'insta' => 'required',
            'face' => 'required',
            'google' => 'required',
            'gambar' => 'mimes:png,jpg,jpeg',
        ]);

        $data = new Dokter();
        $data->nama = $request->nama;
        $data->deskripsi = $request->deskripsi;
        $data->jenis = $request->jenis;
        $data->twiter = $request->twiter;
        $data->insta = $request->insta;
        $data->face = $request->face;
        $data->google = $request->google;


        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namafile = time() . '_' . $file->getClientOriginalName();
            $filepath = 'pasien/foto';

            $file->move(public_path($filepath), $namafile);
            $data->gambar = $namafile;
        }

        $data->save();

        return redirect()->route('tampil.dokter')->with('success', 'dokter telah ditambahkan.');
    }

    // Method untuk update kategori
    public function updatedokter(Request $request, $id)
    {

        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'jenis' => 'required',
            'twiter' => 'required',
            'insta' => 'required',
            'face' => 'required',
            'google' => 'required',
            'gambar' => 'mimes:png,jpg,jpeg',
        ]);

        $data = Dokter::findOrFail($id);
        $data->nama = $request->nama;
        $data->deskripsi = $request->deskripsi;
        $data->jenis = $request->jenis;
        $data->twiter = $request->twiter;
        $data->insta = $request->insta;
        $data->face = $request->face;
        $data->google = $request->google;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($data->gambar && file_exists(public_path('pasien/foto/' . $data->gambar))) {
                unlink(public_path('pasien/foto/' . $data->gambar));
            }

            $file = $request->file('gambar');
            $namafile = time() . '_' . $file->getClientOriginalName();
            $filepath = 'pasien/foto';

            $file->move(public_path($filepath), $namafile);
            $data->gambar = $namafile;
        }

        $data->save();

        return redirect()->route('tampil.dokter')->with('success', 'dokter telah diperbarui.');
    }

    // Method untuk menghapus dokter
    public function deletedokter($id)
    {
        $dokter = Dokter::findOrFail($id);

        if ($dokter->gambar && file_exists(public_path('pasien/foto/' . $dokter->gambar))) {
            unlink(public_path('pasien/foto/' . $dokter->gambar));
        }

        $dokter->delete();

        return redirect()->route('tampil.dokter')->with('success', 'dokter telah dihapus.');
    }
}


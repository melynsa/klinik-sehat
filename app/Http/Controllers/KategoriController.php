<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KategoriController extends Controller
{
    // menampilkan hasil penambahan kategori
    public function tampilkategori()
    {
        $judul = "Form Tambah Data Kategori Baru";
        $title = "Form Edit Data Kategori ";
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori','judul','title'));
    }

    // menyimpan hasil penambahan kategori
    public function simpankategori(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:png,jpg,jpeg',
        ]);

        $data = new Kategori();
        $data->nama = $request->nama;
        $data->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namafile = time() . '_' . $file->getClientOriginalName();
            $filepath = 'upload'; // Direktori penyimpanan gambar di dalam folder public

            $file->move(public_path($filepath), $namafile);
            $data->gambar = $namafile;
        }

        $data->save();

        return redirect()->route('tampil.kategori')->with('success', 'Kategori telah ditambahkan.');
    }

    
    // Method untuk update kategori
    public function updatekategori(Request $request, $id)
    {

        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:png,jpg,jpeg|max:2048',
        ]);

        $data = Kategori::findOrFail($id);
        $data->nama = $request->nama;
        $data->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($data->gambar && file_exists(public_path('upload/' . $data->gambar))) {
                unlink(public_path('upload/' . $data->gambar));
            }

            $file = $request->file('gambar');
            $namafile = time() . '_' . $file->getClientOriginalName();
            $filepath = 'upload';

            $file->move(public_path($filepath), $namafile);
            $data->gambar = $namafile;
        }

        $data->save();

        return redirect()->route('tampil.kategori')->with('success', 'Kategori telah diperbarui.');
    }

    // Method untuk menghapus kategori
    public function deletekategori($id)
    {
        $kategori = Kategori::findOrFail($id);

        if ($kategori->gambar && file_exists(public_path('upload/' . $kategori->gambar))) {
            unlink(public_path('upload/' . $kategori->gambar));
        }

        $kategori->delete();

        return redirect()->route('tampil.kategori')->with('success', 'Kategori telah dihapus.');
    }
}

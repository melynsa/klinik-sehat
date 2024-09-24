<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function tampilblog()
    {
        $judul = "Form Tambah Data Blog Baru";
        $title = "Form Edit Data Blog ";
        $blog = Blog::all();
        return view('Blog.index', compact('blog', 'judul', 'title'));
    }

    // menyimpan hasil penambahan kategori
    public function simpanblog(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tag' => 'required',
            'tglrilis' => 'required|date',
            'gambar' => 'mimes:png,jpg,jpeg',
        ]);

        $data = new Blog();
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->tag = $request->tag;
        $data->tglrilis = $request->tglrilis;
        $data->status = $request->status;


        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namafile = time() . '_' . $file->getClientOriginalName();
            $filepath = 'pasien/foto';

            $file->move(public_path($filepath), $namafile);
            $data->gambar = $namafile;
        }

        $data->save();

        return redirect()->route('tampil.blog')->with('success', 'Blog telah ditambahkan.');
    }

    // Method untuk update kategori
    public function updateblog(Request $request, $id)
    {

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tag' => 'required',
            'tglrilis' => 'required|date',
            'gambar' => 'mimes:png,jpg,jpeg',
        ]);

        $data = Blog::findOrFail($id);
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->tag = $request->tag;
        $data->tglrilis = $request->tglrilis;
        $data->status = $request->status;

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

        return redirect()->route('tampil.blog')->with('success', 'blog telah diperbarui.');
    }

    // Method untuk menghapus blog
    public function deleteblog($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->gambar && file_exists(public_path('pasien/foto/' . $blog->gambar))) {
            unlink(public_path('pasien/foto/' . $blog->gambar));
        }

        $blog->delete();

        return redirect()->route('tampil.blog')->with('success', 'blog telah dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Dokter;
use App\Models\Kategori;
use Illuminate\Http\Request;

class TampilanController extends Controller
{
    public function tampilblog()
    {
        $blog = Blog::all();
        return view('blog', compact('blog'));
    }
    public function tampildokter(){
        $dokter = Dokter::all();
        return view('doctors', compact('dokter'));
    }

    public function tampillanding()
    {
        $dokter = Dokter::paginate(4);
        $kategori = Kategori::paginate(4);
        $blog = Blog::paginate(3);
        return view('index', compact('kategori','dokter','blog'));
    }

    public function tampillandingauth()
    {
        $dokter = Dokter::paginate(4);
        $kategori = Kategori::paginate(4);
        $blog = Blog::paginate(3);
        return view('index', compact('kategori','dokter','blog'));
    }


    public function tampilservice()
    {
        // Ambil semua kategori untuk ditampilkan di landing page
        $kategori = Kategori::all();
        return view('services', compact('kategori'));
    }

    public function tampilappoint()
    {
        return view('appointment');
    }
    public function tampilabout()
    {
        return view('about');
    }
    public function tampildetailblog($id)
    {
        $blogdipilih = Blog::findOrFail($id);
        return view('blog-single', compact('blogdipilih'));
    }

    public function tampilcontact()
    {
        return view('contact');
    }




}

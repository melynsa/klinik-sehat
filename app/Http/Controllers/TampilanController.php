<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Dokter;
use App\Models\Kategori;
use Illuminate\Http\Request;

class TampilanController extends Controller
{
    public function tampillanding()
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
    public function tampildetailblog()
    {
        return view('blog-single');
    }
    public function tampilblog()
    {
        return view('blog');
    }
    public function tampilcontact()
    {
        return view('contact');
    }
    public function tampildoctor()
    {
        return view('doctors');
    }



}

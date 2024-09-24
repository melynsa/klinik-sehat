@extends('layouts.content')
@section('main')
<div>
    <h1>HALAMAN KATEGORI</h1>
    <h1>{{ $judul }}</h1>

    <form action="{{ route('simpan.kategori') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="nama">Nama</label><br>
        <input type="text" class="nama" name="nama" id="nama"><br>
        @error('nama')
            <p>{{ $message }}</p>
        @enderror

        <label for="deskripsi">Deskripsi</label><br>
        <textarea name="deskripsi" id="deskripsi" cols="20" rows="10"></textarea><br>
        @error('deskripsi')
            <p>{{ $message }}</p>
        @enderror

        <label for="gambar">Gambar</label><br>
        <input type="file" class="gambar" name="gambar" id="gambar" ><br>
        @error('gambar')
            <p>{{ $message }}</p>
        @enderror

        <input type="submit" value="submit">
    </form>
</div>
@endsection

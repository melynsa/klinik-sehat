
<div>
    <h1>Edit Kategori</h1>

    <form action="{{ route('update.kategori', $kategori->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <label for="nama">Nama</label><br>
        <input type="text" class="nama" name="nama" id="nama" value="{{ $kategori->nama }}"><br>
        @error('nama')
            <p>{{ $message }}</p>
        @enderror

        <label for="deskripsi">Deskripsi</label><br>
        <textarea name="deskripsi" id="deskripsi" cols="20" rows="10">{{ $kategori->deskripsi }}</textarea><br>
        @error('deskripsi')
            <p>{{ $message }}</p>
        @enderror

        <label for="gambar">Gambar</label><br>
        <input type="file" class="gambar" name="gambar" id="gambar"><br>
        @if ($kategori->gambar)
            <img src="{{ asset('upload/' . $kategori->gambar) }}" alt="Gambar" width="100">
        @endif
        @error('gambar')
            <p>{{ $message }}</p>
        @enderror

        <input type="submit" value="Update">
    </form>
</div>

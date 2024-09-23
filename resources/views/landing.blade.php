
<div class="container">
    <div class="row">
        <h1>Daftar Kategori Pemeriksaan</h1>
        @foreach($kategori as $itemKategori)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('upload/'.$itemKategori->gambar) }}" class="card-img-top" alt="{{ $itemKategori->nama }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $itemKategori->nama }}</h5>
                        <p class="card-text">{{ $itemKategori->deskripsi }}</p>
                        <a href="{{ route('pemeriksaan.create.with.category', $itemKategori->id) }}" class="btn btn-primary">
                            Pilih Pemeriksaan
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

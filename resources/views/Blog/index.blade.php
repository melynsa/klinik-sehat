{{-- extend tampilan --}}
@extends('layouts.content')
{{-- deklarasi section --}}
@section('main')
    <div>
        <h2 class="" style="text-align: center; margin: 20px; font: 900;">Data Blog</h2>
        <div style="text-align: center; margin: 20px;">

            {{-- button tambah kategori --}}
            <button type="button" class="btn"
                style="background-color: grey;padding: 5px 30px; border-radius: 5px; color:white" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Tambahkan Blog
            </button>
        </div>
        {{-- modal tambah kategori --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $judul }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- form penambahan kategori pemeriksaan --}}
                        <form action="{{ route('simpan.blog') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul Blog</label>
                                <input type="text" class="form-control" name="judul" id="judul"
                                    placeholder="Judul Blog ...." required>
                            </div>
                            @error('judul')
                                <p>{{ $message }}</p>
                            @enderror
                            <label for="deskripsi" class="form-label">deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="10" rows="5"></textarea><br>
                            @error('deskripsi')
                                <p>{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Gambar Kategori</label>
                                <input class="form-control" name="gambar" id="gambar" type="file"
                                    accept=".png, .jpg, .jpeg">
                            </div>
                            @error('gambar')
                                <p>{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="tglrilis" class="form-label">Tanggal Rilis</label>
                                <input type="date" class="form-control" name="tglrilis" id="tglrilis" required>
                            </div>
                            @error('tglrilis')
                                <p>{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="tag" class="form-label">tag Blog</label>
                                <input type="text" class="form-control" name="tag" id="tag"
                                    placeholder="" required>
                            </div>
                            @error('tag')
                                <p>{{ $message }}</p>
                            @enderror

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="belum diverifikasi">Belum Diverifikasi</option>
                                    <option value="diverifikasi">Diverifikasi</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        {{-- alert jika berhasil menambahkan --}}
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
        <div class="table-responsive" >
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Rilis</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    {{-- var untuk menampilkan data di Admin Dashboard --}}
                    @foreach ($blog as $blog)
                        <tr>
                            <td>{{ $blog->id }}</td>
                            <td>
                                <a href="{{ asset('pasien/foto/' . $blog->gambar) }}" target="_blank">Gambar {{ $blog->judul }}</a>
                            </td>
                            <td>{{ $blog->judul }}</td>
                            <td>{{ Str::words($blog->deskripsi , 1, '...')}}</td>
                            <td>{{ $blog->tglrilis }}</td>
                            <td>{{ $blog->status }}</td>
                                <td>
                                {{-- button tambah kategori --}}
                                <button type="button" class="btn"
                                style="background-color: black; color: white;border-radius: 5px"
                                    data-bs-toggle="modal" data-bs-target="#editModal{{ $blog->id }}">
                                    Edit
                                </button>
                                {{-- Modal Edit Kategori --}}
                                <div class="modal fade" id="editModal{{ $blog->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $blog->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $blog->id }}">Edit Kategori</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('update.blog', $blog->id) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="judul" class="form-label">Judul</label>
                                                        <input type="text" class="form-control" name="judul" id="judul" value="{{ $blog->judul }}" required>
                                                        @error('judul')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5" required>{{ $blog->deskripsi }}</textarea>
                                                        @error('deskripsi')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="gambar" class="form-label">Gambar</label>
                                                        <input class="form-control" name="gambar" id="gambar" type="file" accept=".png, .jpg, .jpeg">
                                                        @if ($blog->gambar)
                                                            <img src="{{ asset('pasien/foto/' . $blog->gambar) }}" alt="Gambar Kategori" width="100">
                                                        @endif
                                                        @error('gambar')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="tglrilis" class="form-label">Tanggal Rilis</label>
                                                        <input type="date" class="form-control" name="tglrilis" id="tglrilis" value="{{ $blog->tglrilis }}" required>
                                                        @error('tglrilis')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="tag" class="form-label">tag</label>
                                                        <input type="text" class="form-control" name="tag" id="tag" value="{{ $blog->tag }}" required>
                                                        @error('tag')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="status">Status</label>
                                                        <select name="status" id="status" class="form-control">
                                                            <option value="belum diverifikasi" {{ $blog->status == 'belum diverifikasi' ? 'selected' : '' }}>Belum Diverifikasi</option>
                                                            <option value="diverifikasi" {{ $blog->status == 'diverifikasi' ? 'selected' : '' }}>Diverifikasi</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <a href="{{ route('edit.kategori', $blog->id) }}"><button style="background-color: black; color: white;border-radius: 5px">Edit</button></a> --}}
                                <form action="{{ route('delete.blog', $blog->id) }}" method="post"
                                    style="display:inline;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn" onclick="return confirm('Yakin ingin menghapus?')"
                                        style="background-color: red; color: white;border-radius: 5px">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

{{-- extend tampilan --}}
@extends('layouts.content')
{{-- deklarasi section --}}
@section('main')
    <div>
        <h2 class="" style="text-align: center; margin: 20px; font: 900;">Data Kategori</h2>
        <div style="text-align: center; margin: 20px;">

            {{-- button tambah kategori --}}
            <button type="button" class="btn"
                style="background-color: grey;padding: 5px 30px; border-radius: 5px; color:white" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Tambahkan Kategori
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
                        <form action="{{ route('simpan.kategori') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="Nama Kategori" class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control" name="nama" id="nama"
                                    placeholder="Nama Kategori ...." required>
                            </div>
                            @error('nama')
                                <p>{{ $message }}</p>
                            @enderror
                            <label for="Deskripsi" class="form-label">Deskripsi</label>
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

        <table class="table datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Gambar Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi Kategori</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>

                {{-- var untuk menampilkan data di Admin Dashboard --}}
                @foreach ($kategori as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <a href="{{ asset('upload/' . $item->gambar) }}" target="_blank">Gambar {{ $item->nama }}</a>
                        </td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>
                            {{-- button tambah kategori --}}
                            <button type="button" class="btn"
                            style="background-color: black; color: white;border-radius: 5px"
                                data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                Edit
                            </button>
                            {{-- Modal Edit Kategori --}}
                            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Kategori</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('update.kategori', $item->id) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" name="nama" id="nama" value="{{ $item->nama }}" required>
                                                    @error('nama')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5" required>{{ $item->deskripsi }}</textarea>
                                                    @error('deskripsi')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="gambar" class="form-label">Gambar</label>
                                                    <input class="form-control" name="gambar" id="gambar" type="file" accept=".png, .jpg, .jpeg">
                                                    @if ($item->gambar)
                                                        <img src="{{ asset('upload/' . $item->gambar) }}" alt="Gambar Kategori" width="100">
                                                    @endif
                                                    @error('gambar')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <a href="{{ route('edit.kategori', $item->id) }}"><button style="background-color: black; color: white;border-radius: 5px">Edit</button></a> --}}
                            <form action="{{ route('delete.kategori', $item->id) }}" method="post"
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
@endsection

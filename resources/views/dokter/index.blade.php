{{-- extend tampilan --}}
@extends('layouts.content')
{{-- deklarasi section --}}
@section('main')
    <div>
        <h2 class="" style="text-align: center; margin: 20px; font: 900;">Data dokter</h2>
        <div style="text-align: center; margin: 20px;">

            {{-- button tambah kategori --}}
            <button type="button" class="btn"
                style="background-color: grey;padding: 5px 30px; border-radius: 5px; color:white" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Tambahkan dokter
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
                        <form action="{{ route('simpan.dokter') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama dokter</label>
                                <input type="text" class="form-control" name="nama" id="nama"
                                    placeholder="nama dokter ...." required>
                            </div>
                            @error('nama')
                                <p>{{ $message }}</p>
                            @enderror
                            <label for="deskripsi" class="form-label">deskripsi Dokter</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="10" rows="5"></textarea><br>
                            @error('deskripsi')
                                <p>{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Gambar Dokter</label>
                                <input class="form-control" name="gambar" id="gambar" type="file"
                                    accept=".png, .jpg, .jpeg">
                            </div>
                            @error('gambar')
                                <p>{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="jenis" class="form-label">Jenis Dokter</label>
                                <input type="text" class="form-control" name="jenis" id="jenis" required>
                            </div>
                            @error('jenis')
                                <p>{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="twiter" class="form-label">twiter dokter</label>
                                <input type="text" class="form-control" name="twiter" id="twiter"
                                    placeholder="" required>
                            </div>
                            @error('twiter')
                                <p>{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="insta" class="form-label">insta dokter</label>
                                <input type="text" class="form-control" name="insta" id="insta"
                                    placeholder="" required>
                            </div>
                            @error('insta')
                                <p>{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="face" class="form-label">face dokter</label>
                                <input type="text" class="form-control" name="face" id="face"
                                    placeholder="" required>
                            </div>
                            @error('face')
                                <p>{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="google" class="form-label">google dokter</label>
                                <input type="text" class="form-control" name="google" id="google"
                                    placeholder="" required>
                            </div>
                            @error('google')
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
        <div class="table-responsive" >
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Dokter</th>
                        <th>Deskripsi Dokter</th>
                        <th>Jenis Dokter</th>
                        <th>Twitter</th>
                        <th>Instagram</th>
                        <th>Facebook</th>
                        <th>Google</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    {{-- var untuk menampilkan data di Admin Dashboard --}}
                    @foreach ($dokter as $dokter)
                        <tr>
                            <td>{{ $dokter->id }}</td>
                            <td>
                                <a href="{{ asset('pasien/foto/' . $dokter->gambar) }}" target="_blank">Gambar {{ $dokter->judul }}</a>
                            </td>
                            <td>{{ $dokter->nama }}</td>
                            <td>{{ Str::words($dokter->deskripsi , 1, '...')}}</td>
                            <td>{{ $dokter->jenis }}</td>
                            <td>{{ $dokter->twiter }}</td>
                            <td>{{ $dokter->insta }}</td>
                            <td>{{ $dokter->face }}</td>
                            <td>{{ $dokter->google }}</td>
                                <td>
                                {{-- button tambah kategori --}}
                                <button type="button" class="btn"
                                style="background-color: black; color: white;border-radius: 5px"
                                    data-bs-toggle="modal" data-bs-target="#editModal{{ $dokter->id }}">
                                    Edit
                                </button>
                                {{-- Modal Edit Kategori --}}
                                <div class="modal fade" id="editModal{{ $dokter->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $dokter->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $dokter->id }}">Edit Kategori</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('update.dokter', $dokter->id) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="nama" class="form-label">nama</label>
                                                        <input type="text" class="form-control" name="nama" id="nama" value="{{ $dokter->nama }}" required>
                                                        @error('nama')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5" required>{{ $dokter->deskripsi }}</textarea>
                                                        @error('deskripsi')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="gambar" class="form-label">Gambar</label>
                                                        <input class="form-control" name="gambar" id="gambar" type="file" accept=".png, .jpg, .jpeg">
                                                        @if ($dokter->gambar)
                                                            <img src="{{ asset('pasien/foto/' . $dokter->gambar) }}" alt="Gambar Kategori" width="100">
                                                        @endif
                                                        @error('gambar')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jenis" class="form-label">Jenis Dokter</label>
                                                        <input type="text" class="form-control" name="jenis" id="jenis" value="{{ $dokter->jenis }}" required>
                                                        @error('jenis')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="twiter" class="form-label">twiter</label>
                                                        <input type="text" class="form-control" name="twiter" id="twiter" value="{{ $dokter->twiter }}" required>
                                                        @error('twiter')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="insta" class="form-label">insta</label>
                                                        <input type="text" class="form-control" name="insta" id="insta" value="{{ $dokter->insta }}" required>
                                                        @error('insta')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="face" class="form-label">face</label>
                                                        <input type="text" class="form-control" name="face" id="face" value="{{ $dokter->face }}" required>
                                                        @error('face')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="google" class="form-label">google</label>
                                                        <input type="text" class="form-control" name="google" id="google" value="{{ $dokter->google }}" required>
                                                        @error('google')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <a href="{{ route('edit.kategori', $dokter->id) }}"><button style="background-color: black; color: white;border-radius: 5px">Edit</button></a> --}}
                                <form action="{{ route('delete.dokter', $dokter->id) }}" method="post"
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

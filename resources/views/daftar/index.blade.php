{{-- extend tampilan --}}
@extends('layouts.content')
{{-- deklarasi section --}}
@section('main')
    <div>
        <h2 class="" style="text-align: center; margin: 20px; font: 900;">Data daftar</h2>
        <div style="text-align: center; margin: 20px;">

            {{-- button tambah kategori --}}
            <button type="button" class="btn"
                style="background-color: grey;padding: 5px 30px; border-radius: 5px; color:white" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Tambahkan daftar
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
                        <form action="{{ route('simpan.daftar') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Lengkap:</label>
                                <input type="text" id="nama" name="nama" class="form-control" required>
                                @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir:</label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Jenis Kelamin:</label>
                                <div class="form-check">
                                    <input type="radio" id="male" name="jenis_kelamin" value="LAKI-LAKI" class="form-check-input" required>
                                    <label for="male" class="form-check-label">Laki-laki</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="female" name="jenis_kelamin" value="PEREMPUAN" class="form-check-input">
                                    <label for="female" class="form-check-label">Perempuan</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="no_telp">Nomor Telepon/HP:</label>
                                <input type="tel" id="no_telp" name="no_telp" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat Lengkap:</label>
                                <textarea id="alamat" name="alamat" class="form-control" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="foto">Unggah Foto:</label>
                                <input type="file" id="foto" name="foto" class="form-control" accept="image/*" required>
                            </div>

                            <div class="form-group">
                                <label for="layanan">Layanan yang Dibutuhkan:</label>
                                <select id="layanan" name="layanan" class="form-control" required>
                                    <option value="">-- Pilih Layanan --</option>
                                    <option value="Pemeriksaan Kolesterol">Pemeriksaan Kolesterol</option>
                                    <option value="Pemeriksaan Gula Darah">Pemeriksaan Gula Darah</option>
                                    <option value="Pemeriksaan Tensi/Jantung">Pemeriksaan Tensi/Jantung</option>
                                    <option value="Pemeriksaan Hemoglobin">Pemeriksaan Hemoglobin</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_kunjungan">Tanggal Kunjungan:</label>
                                <input type="date" id="tanggal_kunjungan" name="tanggal_kunjungan" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="waktu_kunjungan">Waktu Kunjungan:</label>
                                <input type="time" id="waktu_kunjungan" name="waktu_kunjungan" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Jenis Pasien:</label>
                                <div class="form-check">
                                    <input type="radio" id="umum" name="jenis_pasien" value="UMUM" class="form-check-input" required>
                                    <label for="umum" class="form-check-label">Umum</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="bpjs" name="jenis_pasien" value="BPJS" class="form-check-input">
                                    <label for="bpjs" class="form-check-label">BPJS</label>
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label for="nik">NIK:</label>
                                    <input type="text" id="nik" name="nik" class="form-control" required>
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label for="bpjs_no">Nomor Kartu BPJS:</label>
                                    <input type="text" id="bpjs_no" name="bpjs_no" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="faskes">Faskes Tingkat Pertama:</label>
                                    <select id="faskes" name="faskes" class="form-control">
                                        <option value="">-- Pilih Faskes --</option>
                                        <option value="Puskesmas A">Puskesmas A</option>
                                        <option value="Puskesmas B">Puskesmas B</option>
                                        <option value="Klinik C">Klinik C</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="rujukan">Nomor Rujukan (Jika Ada):</label>
                                    <input type="text" id="rujukan" name="rujukan" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="keluhan">Keluhan:</label>
                                <textarea id="keluhan" name="keluhan" class="form-control" required></textarea >
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </div>
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
                        <th>Nama daftar</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th>layanan</th>
                        <th>tanggalkunjungan</th>
                        <th>waktu kunjungan</th>
                        <th>jenis pasien</th>
                        <th>nik</th>
                        <th>bpjs_no</th>
                        <th>faskes</th>
                        <th>rujukan</th>
                        <th>keluhan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    {{-- var untuk menampilkan data di Admin Dashboard --}}
                    @foreach ($daftar as $pasien)
                        <tr>
                            <td>{{ $pasien->id }}</td>
                            <td>
                                <a href="{{ asset('pasien/foto/' . $pasien->Foto) }}" target="_blank">Foto {{ $pasien->judul }}</a>
                            </td>
                            <td>{{ $pasien->nama }}</td>
                            <td>{{ $pasien->tanggal_lahir }}</td>
                            <td>{{ $pasien->jenis_kelamin }}</td>
                            <td>{{ $pasien->no_telp }}</td>
                            <td>{{ $pasien->alamat }}</td>
                            <td>{{ $pasien->layanan }}</td>
                            <td>{{ $pasien->tanggal_kunjungan }}</td>
                            <td>{{ $pasien->waktu_kunjungan }}</td>
                            <td>{{ $pasien->jenis_pasien }}</td>
                            <td>{{ $pasien->nik }}</td>
                            <td>{{ $pasien->bpjs_no }}</td>
                            <td>{{ $pasien->faskes }}</td>
                            <td>{{ $pasien->rujukan }}</td>
                            <td>{{ $pasien->keluhan }}</td>
                                <td>
                                <form action="{{ route('delete.daftar', $pasien->id) }}" method="post"
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

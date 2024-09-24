@extends('layouts.content')
@section('main')
<div>
    <h2 style="text-align: center;margin-top: 20px">Daftar Pemeriksaan</h2>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <div class="table-responsive" >
        <table class="table datatable" style="overflow-x: auto;">
        <thead>
            <tr>
                <th>Kategori</th>
                <th>Nama Pasien</th>
                <th>Keluhan</th>
                <th>Diagnosa</th>
                <th>Hasil Pemeriksaan</th>
                <th>Tanggal Pemeriksaan</th>
                <th>Jenis Pasien</th>
                <th>Total Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemeriksaan as $pemeriksaan)
                <tr>
                    <td>{{ $pemeriksaan->kategori->nama }}</td>
                    <td>{{ $pemeriksaan->nama_pasien }}</td>
                    <td>{{ $pemeriksaan->keluhan }}</td>
                    <td>{{ $pemeriksaan->diagnosa }}</td>
                    <td>{{ $pemeriksaan->hasil_pemeriksaan }}</td>
                    <td>{{ $pemeriksaan->tglperiksa }}</td>
                    <td>{{ $pemeriksaan->jenis_pasien }}</td>
                    <td>{{ $pemeriksaan->total_pembayaran }}</td>
                    <td>
                        <button type="button" class="btn"
                        style="background-color: black; color: white;border-radius: 5px"
                            data-bs-toggle="modal" data-bs-target="">
                            Edit
                        </button>
                        <form action="" method="post"
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

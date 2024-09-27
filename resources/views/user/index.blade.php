{{-- extend tampilan --}}
@extends('layouts.content')
{{-- deklarasi section --}}
@section('main')
    <div>
        <h2 class="" style="text-align: center; margin: 20px; font: 900;">Data User</h2>
        <div style="text-align: center; margin: 20px;">

            {{-- button tambah kategori --}}
            <button type="button" class="btn"
                style="background-color: grey;padding: 5px 30px; border-radius: 5px; color:white" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Tambahkan User
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
                        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="Nama User" class="form-label">Nama User</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="name User ...." required>
                            </div>
                            @error('name')
                                <p>{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="Email User" class="form-label">Email User</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="email User ...." required>
                            </div>
                            @error('email')
                                <p>{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="Password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Password User ...." required>
                            </div>
                            @error('password')
                                <p>{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="Role User" class="form-label">Role User</label>
                                <select id="role" name="role"  class="form-select">
                                    <option value="petugas">Petugas</option>
                                    <option value="admin">Admin</option>

                                  </select>
                            </div>
                            @error('nama')
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
                    <th>name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                {{-- var untuk menampilkan data di Admin Dashboard --}}
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            {{-- button tambah kategori --}}
                            <button type="button" class="btn"
                                style="background-color: black; color: white;border-radius: 5px" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $user->id }}">
                                Edit
                            </button>
                            {{-- Modal Edit Kategori --}}
                            <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1"
                                aria-labelledby="editModalLabel{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $user->id }}">Edit Kategori
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('user.update', $user->id) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">name</label>
                                                    <input type="text" class="form-control" name="name" id="name"
                                                        value="{{ $user->name }}" required>
                                                    @error('name')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">email</label>
                                                    <input type="email" class="form-control" email="email" id="email"
                                                        value="{{ $user->email }}" required>
                                                    @error('email')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="role" class="form-label">Role</label>
                                                    <select id="role" name="role" class="form-select">
                                                        <option value="petugas" {{ $user->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
                                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                    </select>
                                                    @error('role')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <button type="submit" class="btn btn-success">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('user.destroy', $user->id) }}" method="post"
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

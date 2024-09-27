<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    // menampilkkan tabel user, form tambah dan ubah di dashboard admin
    public function index()
    {
        $judul = "Form Tambah Data User Baru";
        $users = User::all();
        return view('user.index', compact('users', 'judul'));
    }

    // menyimpan form tambah data user
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required||in:petugas,admin',
        ]);

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->role = $request->role;

        $data->save();

        return redirect()->route('index.tampil')->with('success', 'Kategori telah ditambahkan.');
    }

    // menemukan data user berdasarkan id  dan menyimpan hasil update data user
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return redirect()->route('index.tampil')->with('success', 'User updated successfully!');
    }

    // menghapus data user
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('index.tampil')->with('success', 'User deleted successfully!');
    }

    //mengembalikan ke halaman landing untuk melakukan login
    public function showLogin()
    {
        // return redirect()->route('login')->with('error', 'Anda belum login. Silakan login terlebih dahulu.');
        return back()->with('error', 'Anda belum login. Silakan login terlebih dahulu.');
    }

    //mengembalikan ke halaman landing untuk melakukan register
    public function showRegister()
    {
        return back()->with('error', 'Silakan lakukan registrasi terlebih dahulu.');
    }

    // menyimpan data hasil register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $role = User::count() === 0 ? 'admin' : 'petugas';

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role,
        ]);

        return redirect()->route('landing.page')->with('success', 'Registration successful!');
    }


    // mem verifikasi data hasil login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('landingauth.page');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // fungsi log out untuk keluar dari akun
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <h1>Dashboard</h1>

        <!-- Pengecekan apakah user adalah admin -->
        @if(Auth::user()->role === 'admin')
            <!-- Tombol ini hanya muncul jika yang login adalah admin -->
            <a href="/users" class="btn btn-primary">
                Kelola Pengguna
            </a>
        @endif

        <!-- Konten dashboard lainnya -->
        <p>Selamat datang, {{ Auth::user()->name }}!</p>
    </div>

</body>
</html>

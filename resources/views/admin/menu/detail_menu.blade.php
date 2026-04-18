<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Menu - Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            display: flex;
            min-height: 100vh;
        }

        .main-content {
            flex: 1;
            padding: 40px;
        }

        h2 {
            margin-top: 0;
        }

        .button {
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 6px;
            color: #fff;
            background-color: #4caf50;
            margin-right: 5px;
            transition: 0.2s;
        }

        .button:hover {
            background-color: #45a049;
        }

        .menu-detail {
            margin-top: 20px;
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
        }

        .menu-detail img {
            max-width: 250px;
            border-radius: 10px;
        }

        .menu-info {
            max-width: 600px;
        }

        .menu-info p {
            margin: 8px 0;
        }

        .back-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 8px 15px;
            border-radius: 8px;
            text-decoration: none;
            color: #4caf50;
            border: 1px solid #4caf50;
            transition: 0.2s;
        }

        .back-btn:hover {
            background: #4caf50;
            color: #fff;
        }
    </style>
</head>
<body>
    {{-- Sidebar --}}
    @include('components.sidebar')

    <div class="main-content">
        <h2>Detail Menu</h2>

        <a href="{{ route('admin.menu.index') }}" class="back-btn">Kembali ke Daftar Menu</a>

        <div class="menu-detail">
            <div class="menu-image">
                @if($menu->gambar_menu)
                    <img src="{{ asset('storage/' . $menu->gambar_menu) }}" alt="{{ $menu->nama_menu }}">
                @else
                    <img src="https://via.placeholder.com/250x250?text=No+Image" alt="Tidak ada gambar">
                @endif
            </div>

            <div class="menu-info">
                <p><strong>Nama Menu:</strong> {{ $menu->nama_menu }}</p>
                <p><strong>Kategori:</strong> {{ $menu->nama_kategori }}</p>
                <p><strong>Harga:</strong> {{ $menu->harga_menu }}</p>
                <p><strong>Status:</strong> {{ $menu->status_menu }}</p>
                <p><strong>Stok:</strong> {{ $menu->stok_menu }}</p>
                <p><strong>Deskripsi:</strong></p>
                <p>{{ $menu->deskripsi_menu ?? '-' }}</p>

                <a href="{{ route('admin.menu.edit', $menu->id_menu) }}" class="button">Edit Menu</a>
            </div>
        </div>

        {{-- Optional SweetAlert include --}}
        @include('components.alerts')
    </div>
</body>
</html>

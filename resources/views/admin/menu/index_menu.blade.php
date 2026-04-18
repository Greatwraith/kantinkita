<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Menu - Admin</title>

    {{-- ✅ Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- ✅ SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- ✅ Font + Icons --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a2e0e6ad1f.js" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900 flex min-h-screen">

    {{-- ✅ Sidebar (tidak diubah) --}}
    @include('components.sidebar')

    {{-- ✅ Main Content --}}
    <div class="flex-1 p-10">

        {{-- Header --}}
        <div class="mb-6">
            <h1 class="text-4xl font-extrabold leading-tight">Menu</h1>
            <p class="text-gray-600 text-base">Kelola menu dan kategori Kantin Kita</p>
        </div>

        {{-- Filter + Search + Tambah --}}
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">

            {{-- Filter --}}
            <div class="flex flex-wrap items-center gap-2">
                <button 
                    class="px-5 py-2 rounded-full text-sm font-semibold transition 
                    {{ request('filter') == 'all' || !request('filter') ? 'bg-red-700 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}"
                    onclick="window.location.href='?filter=all'">
                    Semua ({{ $allmenu->count() }})
                </button>

                <button 
                    class="px-5 py-2 rounded-full text-sm font-semibold transition 
                    {{ request('filter') == 'makanan' ? 'bg-red-700 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}"
                    onclick="window.location.href='?filter=makanan'">
                    Makanan ({{ $allmenu->where('nama_kategori', 'Makanan')->count() }})
                </button>

                <button 
                    class="px-5 py-2 rounded-full text-sm font-semibold transition 
                    {{ request('filter') == 'minuman' ? 'bg-red-700 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}"
                    onclick="window.location.href='?filter=minuman'">
                    Minuman ({{ $allmenu->where('nama_kategori', 'Minuman')->count() }})
                </button>
            </div>

            {{-- Search + Tambah --}}
            <div class="flex flex-col sm:flex-row items-stretch gap-3 w-full lg:w-auto">
                <form action="{{ route('admin.menu.index') }}" method="GET" class="flex items-center flex-1 bg-white rounded-lg border border-gray-300 overflow-hidden shadow-sm">
                    <div class="px-3 text-gray-400">
                        <i class="fas fa-search"></i>
                    </div>
                    <input type="text" name="search" placeholder="Cari menu" value="{{ request('search') }}"
                        class="flex-1 py-2 pr-3 text-sm outline-none">
                </form>

                <a href="{{ route('admin.menu.create') }}" 
                   class="bg-indigo-800 hover:bg-indigo-900 text-white px-5 py-2.5 rounded-lg shadow text-sm font-semibold transition text-center">
                    + Tambahkan Menu Baru
                </a>
            </div>
        </div>

        {{-- ✅ Grid Menu --}}
        <div class="grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse ($semuamenu as $menu)
                <div class="bg-white rounded-2xl shadow hover:shadow-md transition overflow-hidden">
                    {{-- Gambar --}}
                    <div class="w-full h-44 bg-gray-100 flex items-center justify-center overflow-hidden">
                        @if ($menu->gambar_menu)
                            <img src="{{ asset('storage/' . $menu->gambar_menu) }}" 
                                 alt="{{ $menu->nama_menu }}" 
                                 class="w-full h-full object-cover">
                        @else
                            <span class="text-gray-400 text-sm">Tidak ada gambar</span>
                        @endif
                    </div>

                    {{-- Isi --}}
                    <div class="p-4">
                        <div class="flex justify-between items-start">
                            <h3 class="font-semibold text-lg leading-snug">{{ $menu->nama_menu }}</h3>
                            <p class="text-gray-800 font-medium text-sm">Rp {{ number_format($menu->harga_menu, 0, ',', '.') }}</p>
                        </div>
                        <p class="text-gray-500 text-xs mt-1 flex items-center gap-1">
                            <i class="fas fa-box"></i> Stok sisa {{ $menu->stok_menu ?? '-' }}
                        </p>

                        <div class="flex gap-2 mt-4">
                            <a href="{{ route('admin.menu.edit', $menu->id_menu) }}" 
                               class="flex-1 bg-orange-500 hover:bg-orange-600 text-white py-2 rounded-md text-sm font-semibold transition flex items-center justify-center gap-1">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <form action="{{ route('admin.menu.destroy', $menu->id_menu) }}" method="POST" class="flex-1 delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                        onclick="confirmDelete(this)"
                                        class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded-md text-sm font-semibold transition flex items-center justify-center gap-1">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 col-span-full text-center py-10">Belum ada menu yang ditambahkan.</p>
            @endforelse
        </div>

        {{-- ✅ Alerts --}}
        @include('components.alerts')

    </div>

    <script>
        function confirmDelete(button) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Menu yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#f44336',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    button.closest('form').submit();
                }
            });
        }
    </script>

</body>
</html>

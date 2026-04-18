<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Menu - Kantin SMK Telkom</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #F3F4F6;
        }
    </style>
</head>

<body class="font-[Poppins]">

{{-- NAVBAR --}}
@include('components.navbar')

{{-- WRAPPER (modal-style center) --}}
<div class="min-h-screen flex justify-center items-center px-4 py-10">

    {{-- CARD FIGMA MODAL --}}
    <div class="bg-white w-full max-w-2xl rounded-3xl shadow-2xl p-8 relative">

        {{-- CLOSE BUTTON --}}
        {{-- <a href="{{ route('user.menu.index') }}"
           class="absolute top-5 right-6 text-gray-400 hover:text-gray-600 text-3xl font-light">
           ✕
        </a> --}}

        {{-- TITLE --}}
        <h2 class="text-2xl font-bold mb-8">Pesan Produk</h2>

        {{-- Info Menu --}}
        <div class="flex gap-5 mb-8">

            {{-- Foto --}}
            <img src="{{ asset('storage/'.$menu->gambar_menu) }}"
                 alt="{{ $menu->nama_menu }}"
                 class="w-28 h-28 rounded-xl object-cover shadow">

            {{-- Detail --}}
            <div class="flex flex-col justify-center">
                <h3 class="text-xl font-semibold leading-tight">{{ $menu->nama_menu }}</h3>

                <p class="text-[#D50000] text-lg font-bold mt-1">
                    Rp {{ number_format($menu->harga_menu,0,',','.') }}
                </p>

                {{-- Status --}}
                <span class="mt-3 inline-block px-3 py-1 text-xs font-semibold rounded-full
                    {{ $menu->status_menu=='tersedia' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                    {{ ucfirst($menu->status_menu) }}
                </span>
            </div>

        </div>

        {{-- GARIS PEMBATAS --}}
        <div class="h-[1px] bg-gray-200 w-full my-4"></div>

        {{-- Deskripsi --}}
        <div class="mb-6">
            <h4 class="font-semibold text-gray-800 mb-1 text-sm">Deskripsi</h4>
            <p class="text-gray-700 text-sm leading-relaxed">
                {{ $menu->deskripsi_menu ?? 'Tidak ada deskripsi.' }}
            </p>
        </div>

        {{-- GARIS PEMBATAS --}}
        <div class="h-[1px] bg-gray-200 w-full my-4"></div>

        {{-- FORM --}}
        @if ($menu->status_menu == 'tersedia' && $menu->stok_menu > 0)

        <form action="{{ route('user.cart.store', $menu->id_menu) }}" method="POST" x-data="{qty:1}">
            @csrf

            {{-- Jumlah --}}
            <div class="mt-3 mb-6">
                <h4 class="font-semibold text-gray-800 mb-2 text-sm">Jumlah</h4>

                <div class="flex items-center gap-5">

                    {{-- Kurang --}}
                    <button type="button"
                        class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 text-xl"
                        @click="if(qty>1) qty--">
                        −
                    </button>

                    <span class="font-bold text-xl" x-text="qty"></span>

                    {{-- Tambah --}}
                    <button type="button"
                        class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 text-xl"
                        @click="qty++">
                        +
                    </button>

                </div>

                <input type="hidden" name="jumlah" :value="qty">
            </div>

            {{-- Total --}}
            <div class="flex justify-between items-center text-lg font-semibold mb-8">
                <span>Total:</span>
                <span class="text-[#D50000]">
                    Rp <span x-text="(qty * {{ $menu->harga_menu }}).toLocaleString('id-ID')"></span>
                </span>
            </div>

            {{-- Tombol --}}
            <div class="flex gap-4">

                {{-- Batal --}}
                <a href="{{ route('user.menu.index') }}"
                   class="w-1/2 text-center py-3 bg-gray-200 rounded-xl font-semibold hover:bg-gray-300">
                    Batal
                </a>

                {{-- Pesan --}}
                <button type="submit"
                        class="w-1/2 py-3 bg-[#D50000] text-white font-semibold rounded-xl hover:bg-[#B00000] transition">
                    Pesan Sekarang
                </button>

            </div>

        </form>

        @else

        {{-- Jika habis --}}
        <div class="mt-6 text-center bg-gray-300 text-white font-semibold py-3 rounded-xl">
            Stok Habis
        </div>

        @endif

    </div>

</div>

{{-- FOOTER --}}
@include('components.footer')

</body>
</html>

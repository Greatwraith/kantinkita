<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kantin Kita - Menu</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body class="bg-[#F9FAFB] font-[Poppins] text-gray-800">

  {{-- ✅ Navbar --}}
  @include('components.navbar')
  

  {{-- 🔴 Banner --}}
  <section class="bg-red-700 text-white py-16 px-6 rounded-xl mx-6 mt-6 flex justify-center items-center text-center">
    <h2 class="text-lg md:text-xl font-semibold">Banner (menu baru, info diskon, dll)</h2>
  </section>

  <div class="container mx-auto px-6 py-10 relative">

    {{-- 🔍 Filter & Sort --}}
    <div class="relative flex items-center justify-between border-b pb-4 mb-6">

      {{-- 🎯 Kategori (DI-CENTER-KAN) --}}
      <div class="absolute left-1/2 -translate-x-1/2 flex gap-6 text-sm font-medium">
        <a href="?filter=all"
           class="{{ request('filter') == 'all' || !request('filter') ? 'text-black border-b-2 border-black' : 'text-gray-500 hover:text-black' }}">
           Semua
        </a>

        <a href="?filter=makanan"
           class="{{ request('filter') == 'makanan' ? 'text-black border-b-2 border-black' : 'text-gray-500 hover:text-black' }}">
           Makanan
        </a>

        <a href="?filter=minuman"
           class="{{ request('filter') == 'minuman' ? 'text-black border-b-2 border-black' : 'text-gray-500 hover:text-black' }}">
           Minuman
        </a>
      </div>

      {{-- 🔽 Sort Dropdown (TIDAK DIUBAH) --}}
      <form method="GET" class="ml-auto flex items-center">
        <input type="hidden" name="filter" value="{{ request('filter') }}">
        <select name="sort"
                onchange="this.form.submit()"
                class="border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-red-500">
          <option value="">Terbaru</option>
          <option value="termurah" {{ request('sort') == 'termurah' ? 'selected' : '' }}>Termurah</option>
          <option value="termahal" {{ request('sort') == 'termahal' ? 'selected' : '' }}>Termahal</option>
        </select>
      </form>

    </div>

    {{-- 🧾 List Menu --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      @forelse ($semuamenu as $menu)
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition p-3 flex flex-col">

          {{-- Gambar + Badge Habis --}}
          <div class="relative">
            @if ($menu->gambar_menu)
              <img src="{{ asset('storage/' . $menu->gambar_menu) }}"
                   alt="{{ $menu->nama_menu }}"
                   class="rounded-lg mb-3 h-48 w-full object-cover">
            @else
              <div class="h-48 bg-gray-200 rounded-lg mb-3 flex items-center justify-center text-gray-400">
                No Image
              </div>
            @endif

            {{-- 🔴 Badge Habis --}}
            @if ($menu->stok_menu <= 0 || $menu->status_menu == 'habis')
              <span class="absolute top-2 right-2 bg-red-600 text-white text-xs font-semibold px-2 py-1 rounded">
                Habis
              </span>
            @endif
          </div>

          {{-- Info Menu --}}
          <div class="flex-1 flex flex-col">
            <h2 class="font-semibold text-base mb-1">{{ $menu->nama_menu }}</h2>
            <p class="text-gray-500 text-sm mb-2">{{ $menu->nama_kategori }}</p>
            <p class="text-gray-800 font-medium mb-3">
              Rp {{ number_format($menu->harga_menu, 0, ',', '.') }}
            </p>

            {{-- 🔘 Tombol --}}
            @if ($menu->stok_menu <= 0 || $menu->status_menu == 'habis')
              <button
                class="mt-auto inline-block px-4 py-2 rounded-full bg-gray-400 text-white text-center cursor-not-allowed">
                Stok Habis
              </button>
            @else
              <a href="{{ route('user.menu.show', ['id' => $menu->id_menu, 'search' => request('search')]) }}" 
                 class="mt-auto inline-block px-4 py-2 rounded-full bg-red-600 text-white text-center hover:bg-red-700 transition">
                Lihat Detail
              </a>
            @endif
          </div>

        </div>
      @empty
        <p class="col-span-full text-center text-gray-500">Tidak ada menu tersedia.</p>
      @endforelse
    </div>

  </div>

  {{-- SweetAlert --}}
  @include('components.alerts')

</body>
</html>

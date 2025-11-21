<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kantin Kita - Menu</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>

<body class="bg-[#F9FAFB] font-[Poppins] text-gray-800">

  {{-- Navbar --}}
  @include('components.navbar')
  
  {{-- Banner --}}
  <section class="bg-red-700 text-white py-16 px-6 rounded-xl mx-6 mt-6 flex justify-center items-center text-center">
    <h2 class="text-lg md:text-xl font-semibold">Banner (menu baru, info diskon, dll)</h2>
  </section>


<div class="container mx-auto px-6 py-10 relative mb-52 pb-20">

    {{-- Filter & Sort --}}
    <div class="relative flex items-center justify-between border-b pb-4 mb-6">

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

    {{-- List Menu --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      @forelse ($semuamenu as $menu)
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition p-3 flex flex-col">

          {{-- Gambar --}}
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

            {{-- Badge Habis --}}
            @if ($menu->stok_menu <= 0 || $menu->status_menu == 'habis')
              <span class="absolute top-2 right-2 bg-red-600 text-white text-xs font-semibold px-2 py-1 rounded">
                Habis
              </span>
            @endif
          </div>

          {{-- Info Menu --}}
          <div class="flex-1 flex flex-col pt-1">

              <h2 class="font-semibold text-lg mb-1 leading-tight">{{ $menu->nama_menu }}</h2>
              <p class="text-gray-500 text-sm mb-3">{{ $menu->nama_kategori }}</p>

              {{-- Harga + Tombol (Kanan) --}}
              <div class="flex items-center justify-between mb-4">
                  <p class="text-red-600 font-semibold text-xl">
                      Rp {{ number_format($menu->harga_menu, 0, ',', '.') }}
                  </p>

                  @if ($menu->stok_menu <= 0 || $menu->status_menu == 'habis')
                      <button
                          class="px-3 py-1 text-xs rounded-md bg-gray-300 text-white font-semibold cursor-not-allowed">
                          Habis
                      </button>
                  @else
                      <a href="{{ route('user.menu.show', ['id' => $menu->id_menu]) }}" 
                         class="flex items-center gap-1 px-5 py-2 text-l rounded-md bg-red-600 text-white 
                                font-semibold hover:bg-red-700 transition">
                          <x-ionicon-cart-outline class="w-6 h-6"/>
                          Pesan
                      </a>
                  @endif
              </div>

          </div>

        </div>
      @empty
        <p class="col-span-full text-center text-gray-500 mt-20 text-lg">Tidak ada menu tersedia.</p>
      @endforelse
    </div>

  </div>

  @include('components.alerts')



  @include('components.footer')





@if($total_items > 0)
    <a href="{{ route('user.cart.index') }}"
       class="fixed bottom-5 left-1/2 -translate-x-1/2 w-[95%] md:w-[850px]
              bg-[#A00000] text-white rounded-2xl shadow-2xl px-6 py-4 z-50 
              flex justify-between items-center cursor-pointer active:scale-95 transition">

        <div class="flex items-center gap-2 text-lg font-semibold">
            <x-ionicon-cart-outline class="w-6 h-6"/>
            {{ $total_items }} produk
        </div>

        <div class="text-lg font-semibold">
            Rp {{ number_format($total_price, 0, ',', '.') }}
        </div>

    </a>
@endif



</body>
</html>




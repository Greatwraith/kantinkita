@if ($semuamenu->count() > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($semuamenu as $menu)
            <div class="bg-white rounded-xl shadow-md overflow-hidden transition hover:shadow-lg">
                <div class="h-40 bg-gray-100">
                    @if($menu->gambar_menu)
                        <img src="{{ asset('storage/' . $menu->gambar_menu) }}" 
                            alt="{{ $menu->nama_menu }}" 
                            class="w-full h-full object-cover">
                    @else
                        <div class="flex items-center justify-center h-full text-gray-400 text-sm">Tidak ada gambar</div>
                    @endif
                </div>

                <div class="p-4">
                    <div class="flex justify-between items-center mb-1">
                        <h3 class="font-semibold text-gray-800 truncate">{{ $menu->nama_menu }}</h3>
                        <p class="text-sm font-medium text-gray-700">Rp {{ number_format($menu->harga_menu, 0, ',', '.') }}</p>
                    </div>
                    <p class="text-gray-500 text-sm mb-3">
                        <i class="fas fa-box-open mr-1"></i> Stok sisa {{ $menu->stok_menu ?? '0' }}
                    </p>

                    <div class="flex gap-2">
                        <a href="{{ route('admin.menu.edit', $menu->id_menu) }}"
                            class="flex items-center justify-center gap-1 bg-red-700 hover:bg-red-800 text-white px-3 py-1.5 rounded-md text-sm w-1/2 transition">
                            <i class="fas fa-pen"></i> Edit
                        </a>
                        <form action="{{ route('admin.menu.destroy', $menu->id_menu) }}" method="POST" class="w-1/2 delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmDelete(this)"
                                class="flex items-center justify-center gap-1 bg-red-700 hover:bg-red-800 text-white px-3 py-1.5 rounded-md text-sm w-full transition">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p class="text-center text-gray-500 mt-10">Belum ada menu yang tersedia.</p>
@endif

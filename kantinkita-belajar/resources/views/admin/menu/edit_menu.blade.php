<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu - Admin</title>

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Font + Icons --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a2e0e6ad1f.js" crossorigin="anonymous"></script>

    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex">

    {{-- Sidebar --}}
    @include('components.sidebar')

    {{-- Main Content --}}
    <main class="flex-1 flex justify-center items-center p-8">
        <div class="w-full max-w-xl">

            {{-- Judul --}}
            <h2 class="text-2xl font-semibold text-gray-700 mb-6 flex items-center gap-2">
                <i class="fa-solid fa-pen text-red-500"></i> Edit Menu
            </h2>

            {{-- Tombol Kembali --}}
            <a href="{{ route('admin.menu.index') }}"
               class="flex items-center gap-2 text-red-600 hover:text-red-700 font-medium mb-6 transition">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Kembali</span>
            </a>

            {{-- Form --}}
            <form action="{{ route('admin.menu.update', $menu->id_menu) }}" method="POST" enctype="multipart/form-data"
                  class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm space-y-4 w-full">
                @csrf
                @method('PUT')

                {{-- Kategori --}}
                <div>
                    <label for="nama_kategori" class="block text-gray-700 font-medium mb-2">Kategori Menu</label>
                    <select name="nama_kategori" id="nama_kategori"
                            class="w-full border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500 p-2"
                            required>
                        <option value="Makanan" {{ old('nama_kategori', $menu->nama_kategori) == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                        <option value="Minuman" {{ old('nama_kategori', $menu->nama_kategori) == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                    </select>
                    @error('nama_kategori') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Nama Menu --}}
                <div>
                    <label for="nama_menu" class="block text-gray-700 font-medium mb-2">Nama Menu</label>
                    <input type="text" name="nama_menu" id="nama_menu" value="{{ old('nama_menu', $menu->nama_menu) }}"
                           class="w-full border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500 p-2"
                           required>
                    @error('nama_menu') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Harga --}}
                <div>
                    <label for="harga_menu" class="block text-gray-700 font-medium mb-2">Harga Menu</label>
                    <input type="number" name="harga_menu" id="harga_menu" value="{{ old('harga_menu', $menu->harga_menu) }}"
                           class="w-full border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500 p-2"
                           min="1000" required>
                    @error('harga_menu') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label for="deskripsi_menu" class="block text-gray-700 font-medium mb-2">Deskripsi Menu</label>
                    <textarea name="deskripsi_menu" id="deskripsi_menu" rows="4"
                              class="w-full border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500 p-2"
                              required>{{ old('deskripsi_menu', $menu->deskripsi_menu) }}</textarea>
                    @error('deskripsi_menu') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Gambar --}}
                <div>
                    <label for="gambar_menu" class="block text-gray-700 font-medium mb-2">Gambar Menu</label>
                    @if($menu->gambar_menu)
                        <img src="{{ asset('storage/'.$menu->gambar_menu) }}" alt="Gambar Menu" class="mb-2 w-32 h-32 object-cover rounded-md">
                    @endif
                    <input type="file" name="gambar_menu" id="gambar_menu" accept="image/*"
                           class="w-full border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500 p-2">
                    @error('gambar_menu') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Status --}}
                <div>
                    <label for="status_menu" class="block text-gray-700 font-medium mb-2">Status Menu</label>
                    <select name="status_menu" id="status_menu"
                            class="w-full border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500 p-2"
                            required>
                        <option value="tersedia" {{ old('status_menu', $menu->status_menu) == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="habis" {{ old('status_menu', $menu->status_menu) == 'habis' ? 'selected' : '' }}>Habis</option>
                    </select>
                    @error('status_menu') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Stok --}}
                <div>
                    <label for="stok_menu" class="block text-gray-700 font-medium mb-2">Stok Menu</label>
                    <input type="number" name="stok_menu" id="stok_menu" value="{{ old('stok_menu', $menu->stok_menu) }}"
                           class="w-full border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500 p-2"
                           required>
                    @error('stok_menu') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Submit --}}
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-md transition w-full flex justify-center items-center gap-2 font-semibold">
                    <i class="fa-solid fa-save"></i> Update Menu
                </button>
            </form>

            {{-- SweetAlert Feedback --}}
            @include('components.alerts')
        </div>
    </main>

</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu - Admin</title>

    {{-- ✅ Tailwind CSS via CDN --}}
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
<body class="bg-gray-50 min-h-screen flex">

    {{-- Sidebar --}}
    @include('components.sidebar')

    {{-- Main Content --}}
    <main class="flex-1 flex justify-center items-center p-8">
        <div class="w-full max-w-xl">

            {{-- Judul --}}
            <h2 class="text-2xl font-semibold text-gray-700 mb-6 flex items-center gap-2">
                <i class="fa-solid fa-plus text-red-500"></i> Tambah Menu Baru
            </h2>

            {{-- Tombol Kembali --}}
            <a href="{{ route('admin.menu.index') }}"
               class="flex items-center gap-2 text-red-600 hover:text-red-700 font-medium mb-6 transition">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Kembali</span>
            </a>

            {{-- Form --}}
          <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data"
      class="bg-red-700 p-6 rounded-lg border border-gray-200 w-full text-white">
    @csrf

    {{-- Kategori --}}
    <div class="mb-4">
        <label for="nama_kategori" class="block font-medium mb-2 text-white">Kategori Menu</label>
        <select name="nama_kategori" id="nama_kategori"
                class="w-full border bg-white text-black rounded-md focus:ring-red-300 focus:border-red-300 p-2"
                required>
            <option value="">-- Pilih Kategori --</option>
            <option value="Makanan" {{ old('nama_kategori') == 'Makanan' ? 'selected' : '' }}>Makanan</option>
            <option value="Minuman" {{ old('nama_kategori') == 'Minuman' ? 'selected' : '' }}>Minuman</option>
        </select>
    </div>

    {{-- Nama Menu --}}
    <div class="mb-4">
        <label for="nama_menu" class="block font-medium mb-2 text-white">Nama Menu</label>
        <input type="text" name="nama_menu" id="nama_menu" value="{{ old('nama_menu') }}"
               class="w-full border bg-white text-black rounded-md focus:ring-red-300 focus:border-red-300 p-2"
               required>
    </div>

    {{-- Harga --}}
    <div class="mb-4">
        <label for="harga_menu" class="block font-medium mb-2 text-white">Harga Menu</label>
        <input type="number" name="harga_menu" id="harga_menu" value="{{ old('harga_menu') }}"
               class="w-full border bg-white text-black rounded-md focus:ring-red-300 focus:border-red-300 p-2"
               min="1000" required>
    </div>

    {{-- Deskripsi --}}
    <div class="mb-4">
        <label for="deskripsi_menu" class="block font-medium mb-2 text-white">Deskripsi Menu</label>
        <textarea name="deskripsi_menu" id="deskripsi_menu" rows="4"
                  class="w-full border bg-white text-black rounded-md focus:ring-red-300 focus:border-red-300 p-2"
                  required>{{ old('deskripsi_menu') }}</textarea>
    </div>

    {{-- Gambar --}}
    <div class="mb-4">
        <label for="gambar_menu" class="block font-medium mb-2 text-white">Gambar Menu</label>
        <input type="file" name="gambar_menu" id="gambar_menu" accept="image/*"
               class="w-full border bg-white text-black rounded-md focus:ring-red-300 focus:border-red-300 p-2"
               {{ old('gambar_menu') ? '' : 'required' }}>
    </div>

    {{-- Status --}}
    <div class="mb-4">
        <label for="status_menu" class="block font-medium mb-2 text-white">Status Menu</label>
        <select name="status_menu" id="status_menu"
                class="w-full border bg-white text-black rounded-md focus:ring-red-300 focus:border-red-300 p-2"
                required>
            <option value="tersedia" {{ old('status_menu') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
            <option value="habis" {{ old('status_menu') == 'habis' ? 'selected' : '' }}>Habis</option>
        </select>
    </div>

    {{-- Stok --}}
    <div class="mb-6">
        <label for="stok_menu" class="block font-medium mb-2 text-white">Stok Menu</label>
        <input type="number" name="stok_menu" id="stok_menu" value="{{ old('stok_menu') }}"
               class="w-full border bg-white text-black rounded-md focus:ring-red-300 focus:border-red-300 p-2"
               required>
    </div>

    {{-- Submit --}}
    <button type="submit"
            class="bg-white hover:bg-gray-100 text-red-700 px-6 py-2 rounded-md transition w-full flex justify-center items-center gap-2 font-semibold">
        <i class="fa-solid fa-save"></i> Simpan Menu
    </button>

</form>


            {{-- SweetAlert Feedback --}}
            @include('components.alerts')
        </div>
    </main>

</body>

</html>

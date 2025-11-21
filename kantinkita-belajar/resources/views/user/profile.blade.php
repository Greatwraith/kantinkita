<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil Pengguna</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-100 font-[Poppins] min-h-screen">

  @include('components.navbar')

  <div class="max-w-5xl mx-auto mt-8">

    <!-- CARD INFORMASI USER -->
    <div class="bg-white rounded-xl shadow p-6 mb-10">

      <!-- FOTO + IDENTITAS -->
      <div class="flex items-center gap-4 mb-6">
        <img 
          src="{{ $user->avatar ?? 'https://i.pravatar.cc/120' }}" 
          class="w-24 h-24 rounded-full object-cover border"
          alt="Foto Profil"
        >
        <div>
          <h2 class="text-xl font-bold">{{ $user->name }}</h2>
          <p class="text-gray-600 text-sm">{{ $user->nis ?? '-' }}</p>
          <p class="text-gray-600 text-sm">
            {{ $user->kelas ?? '-' }} | {{ $user->jurusan ?? '-' }}
          </p>
        </div>
      </div>

      <h3 class="font-semibold text-lg mb-4 flex items-center gap-2">
         Informasi Akun
      </h3>

      <!-- GRID INFO USER -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <div>
          <p class="text-sm text-gray-500">Nama Lengkap</p>
          <p class="font-semibold">{{ $user->name }}</p>
        </div>

        <div>
          <p class="text-sm text-gray-500">NIS</p>
          <p class="font-semibold">{{ $user->nis ?? '-' }}</p>
        </div>

        <div>
          <p class="text-sm text-gray-500">Email</p>
          <p class="font-semibold">{{ $user->email }}</p>
        </div>

        <div>
          <p class="text-sm text-gray-500">Nomor Telepon</p>
          <p class="font-semibold">{{ $user->telepon ?? '-' }}</p>
        </div>

      </div>

    </div>

    <!-- CARD RIWAYAT PESANAN -->
    <div class="bg-white rounded-xl shadow p-6 mb-20">

      <h2 class="text-xl font-bold mb-6 flex items-center gap-2">
        Riwayat Pesanan
      </h2>

      @if ($orders->isEmpty())
        <p class="text-gray-500 text-sm">Belum ada pesanan.</p>
      @else

      <!-- TABLE RIWAYAT PESANAN -->
      <div class="divide-y">
        @foreach ($orders as $order)
          <div class="py-4 grid grid-cols-1 md:grid-cols-3 gap-4 items-center">

            <!-- TANGGAL -->
            <div>
              <p class="font-semibold text-gray-800">Tanggal Pemesanan</p>
              <p class="text-sm text-gray-600">
                {{ $order->created_at->format('l, d F Y') }}
              </p>
            </div>

            <!-- DETAIL PESANAN -->
            <div>
              <p class="font-semibold text-gray-800">Detail Pesanan</p>
              <p class="text-sm text-gray-600">
                @foreach ($order->detailTransaksi as $item)
                  {{ $item->menu->nama_menu }} ({{ $item->jumlah }}),
                @endforeach
              </p>
            </div>

            <!-- TOTAL -->
            <div class="text-left md:text-right">
              <p class="font-semibold text-gray-800">
                Rp {{ number_format($order->detailTransaksi->sum('sub_total'), 0, ',', '.') }}
              </p>
              <p class="text-sm text-gray-600">
                {{ $order->detailTransaksi->count() }} Produk
              </p>
            </div>

          </div>
        @endforeach
      </div>

      @endif
    </div>

  </div>

  @include('components.footer')

</body>
</html>

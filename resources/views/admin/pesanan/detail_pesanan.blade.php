<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - Admin</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex">
    {{-- Sidebar --}}
    @include('components.sidebar')

    <main class="flex-1 p-6">

        <h1 class="text-2xl font-bold mb-6">Detail Pesanan #{{ $transaksi->id_transaksi }}</h1>

        {{-- ===================== --}}
        {{-- 🔶 INFORMASI PELANGGAN --}}
        {{-- ===================== --}}
        <div class="bg-gray-100 p-6 rounded-xl shadow mb-6">
            <h2 class="text-lg font-semibold mb-4">Informasi Pelanggan</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- Nama --}}
                <div>
                    <p class="text-gray-500 text-sm">Nama</p>
                    <p class="text-lg font-semibold">
                        {{ $transaksi->user->name ?? 'Tidak diketahui' }}
                    </p>
                </div>

                {{-- NIS --}}
                <div>
                    <p class="text-gray-500 text-sm">NIS</p>
                    <p class="text-lg font-semibold">
                        {{ $transaksi->user->nis ?? '-' }}
                    </p>
                </div>

                {{-- Waktu Pesan --}}
                <div>
                    <p class="text-gray-500 text-sm">Waktu Pesan</p>
                    <p class="text-lg font-semibold">
                        {{ $transaksi->created_at->translatedFormat('l, d F Y • H:i') }}
                    </p>
                </div>

                {{-- Status --}}
                <div>
                    <p class="text-gray-500 text-sm">Status</p>

                    <span class="px-3 py-1 rounded-lg text-white text-sm font-medium
                        @if($transaksi->status_pesanan == 'menunggu') bg-yellow-500
                        @elseif($transaksi->status_pesanan == 'completed') bg-green-600
                        @else bg-red-600
                        @endif">
                        {{ ucfirst($transaksi->status_pesanan) }}
                    </span>
                </div>

            </div>
        </div>


        {{-- ===================== --}}
        {{-- 🛒 DETAIL PESANAN --}}
        {{-- ===================== --}}
        <h2 class="text-lg font-semibold mb-3">Detail Pesanan</h2>

        <div class="overflow-hidden bg-white rounded-xl shadow">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-100 text-sm border-b">
                        <th class="p-3 font-semibold">Item</th>
                        <th class="p-3 font-semibold">Qty</th>
                        <th class="p-3 font-semibold">Harga</th>
                        <th class="p-3 font-semibold">Subtotal</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($transaksi->detailTransaksi as $detail)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3">{{ $detail->menu->nama_menu }}</td>
                            <td class="p-3">{{ $detail->jumlah }}</td>
                            <td class="p-3">Rp {{ number_format($detail->harga_satuan, 0, ',', '.') }}</td>
                            <td class="p-3 font-semibold">
                                Rp {{ number_format($detail->sub_total, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach

                    {{-- TOTAL --}}
                    <tr class="bg-gray-50 font-semibold">
                        <td class="p-3"></td>
                        <td class="p-3"></td>
                        <td class="p-3 text-right">Total:</td>
                        <td class="p-3 text-lg">
                            Rp {{ number_format($transaksi->detailTransaksi->sum('sub_total'), 0, ',', '.') }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Tombol kembali --}}
        <a href="{{ route('admin.pesanan.index') }}"
           class="mt-6 inline-block bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-gray-800">
            Kembali
        </a>
    </main>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Riwayat Transaksi</title>

    {{-- Font & Tailwind --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex bg-gray-100 font-[Poppins] text-gray-800">

    {{-- Sidebar --}}
    <x-sidebar />

    {{-- Konten Utama --}}
    <main class="flex-1 p-8 overflow-auto">
        <h1 class="text-4xl font-bold text-gray-900 mb-2">Riwayat Transaksi</h1>
        <p class="text-gray-600 mb-8">Lihat riwayat transaksi Kantin Kita</p>

        {{-- Statistik --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
            <div class="bg-white shadow-md rounded-xl p-6 text-center">
                <h2 class="text-gray-600 font-medium mb-1">Total item terjual</h2>
                <p class="text-4xl font-extrabold text-gray-900">{{ $totalItemTerjual ?? 0 }}</p>
            </div>

            <div class="bg-white shadow-md rounded-xl p-6 text-center">
                <h2 class="text-gray-600 font-medium mb-1">Total pemasukan</h2>
                <p class="text-4xl font-extrabold text-gray-900">
                    Rp {{ number_format($totalPemasukan ?? 0, 0, ',', '.') }}
                </p>
            </div>
        </div>

        {{-- Tabel --}}
        <div class="bg-white shadow-md rounded-xl p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Daftar Transaksi</h3>

            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse">
                    <thead>
                        <tr class="border-b bg-gray-50 text-left text-gray-700">
                            <th class="py-3 px-4 font-semibold">Order ID</th>
                            <th class="py-3 px-4 font-semibold">Nama Pelanggan</th>
                            <th class="py-3 px-4 font-semibold">Pesanan</th>
                            <th class="py-3 px-4 font-semibold">Total</th>
                            <th class="py-3 px-4 font-semibold">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transaksi as $t)
                            <tr class="border-b hover:bg-gray-50 transition">
                                <td class="py-3 px-4">{{ str_pad($t->id_transaksi, 3, '0', STR_PAD_LEFT) }}</td>
                                <td class="py-3 px-4">{{ $t->user->name ?? '-' }}</td>
                                <td class="py-3 px-4">
                                    {{ $t->detailTransaksi->pluck('menu.nama_menu')->join(', ') }}
                                </td>
                                <td class="py-3 px-4">
                                    Rp {{ number_format($t->detailTransaksi->sum('sub_total'), 0, ',', '.') }}
                                </td>
                                <td class="py-3 px-4 text-gray-600 text-sm">
                                    {{ $t->created_at->format('H:i d/m/Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-gray-500">Belum ada transaksi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>

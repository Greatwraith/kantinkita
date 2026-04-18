<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pesanan - Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>

<body class="bg-gray-50 text-gray-900 flex min-h-screen">

    @include('components.sidebar')

    <main class="flex-1 p-8">

        {{-- TITLE --}}
        <h1 class="text-3xl font-bold">Pesanan</h1>
        <p class="text-gray-600 mb-6">Silahkan kelola pesanan Kantin Kita</p>

        {{-- SEARCH --}}
        <form method="GET" class="mb-6">
            <div class="relative">
                <input type="text" name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari pesanan berdasarkan nama pembeli"
                       class="w-full border rounded-xl px-4 py-3 shadow-sm focus:outline-none focus:ring-2 focus:ring-red-600 pl-10">

                <span class="absolute left-3 top-3.5 text-gray-400">
                    🔍
                </span>
            </div>
        </form>

        {{-- FILTER BUTTONS --}}
        <div class="flex gap-3 mb-6">

            {{-- SEMUA --}}
            <a href="{{ route('admin.pesanan.index') }}"
               class="px-6 py-2 rounded-full font-semibold shadow
               {{ !request('status') ? 'bg-red-700 text-white' : 'bg-gray-200 text-gray-800' }}">
                Semua ({{ \App\Models\Transaksi::count() }})
            </a>

            {{-- MENUNGGU --}}
            <a href="{{ route('admin.pesanan.index', ['status' => 'menunggu']) }}"
               class="px-6 py-2 rounded-full font-semibold shadow
               {{ request('status') === 'menunggu' ? 'bg-red-700 text-white' : 'bg-gray-200 text-gray-800' }}">
                Menunggu ({{ \App\Models\Transaksi::where('status_pesanan','menunggu')->count() }})
            </a>

            {{-- SELESAI --}}
            <a href="{{ route('admin.pesanan.index', ['status' => 'completed']) }}"
               class="px-6 py-2 rounded-full font-semibold shadow
               {{ request('status') === 'completed' ? 'bg-red-700 text-white' : 'bg-gray-200 text-gray-800' }}">
                Selesai ({{ \App\Models\Transaksi::where('status_pesanan','completed')->count() }})
            </a>
        </div>

        {{-- LIST PESANAN --}}
        <div class="space-y-5">

            @forelse($pesanan as $p)

                {{-- CARD PESANAN --}}
                <div class="bg-white rounded-xl shadow p-6 border 
                    @if($loop->first) border-blue-400 @else border-transparent @endif">

                    <div class="flex justify-between items-start">

                        {{-- ID + STATUS --}}
                        <div>
    <div class="flex items-center gap-3">
        <p class="font-bold text-lg">#{{ sprintf('%03d', $p->id_transaksi) }}</p>

        <span class="px-4 py-1 rounded-full text-white text-sm font-semibold
            @if($p->status_pesanan === 'completed') bg-green-600
            @elseif($p->status_pesanan === 'menunggu') bg-yellow-500
            @else bg-red-600 @endif">
            {{ ucfirst($p->status_pesanan) }}
        </span>
    </div>

    <p class="text-gray-800 text-lg mt-2">
        {{ $p->user->name ?? 'Tidak Diketahui' }}
    </p>
</div>


                        {{-- ACTION BUTTONS --}}
                        <div class="flex gap-3">

                            @if($p->status_pesanan === 'menunggu')

                                {{-- BATAL --}}
                                <form action="{{ route('admin.pesanan.cancel', $p->id_transaksi) }}" 
                                      method="POST" class="cancel-form">
                                    @csrf
                                    <button type="button"
                                        class="px-6 py-2 bg-red-600 text-white rounded-xl shadow hover:bg-red-700 transition flex items-center gap-1">
                                        ✕ Batal
                                    </button>
                                </form>

                                {{-- SELESAI --}}
                                <form action="{{ route('admin.pesanan.complete', $p->id_transaksi) }}" 
                                      method="POST" class="complete-form">
                                    @csrf
                                    <button type="button"
                                        class="px-6 py-2 bg-green-600 text-white rounded-xl shadow hover:bg-green-700 transition flex items-center gap-1">
                                        ✓ Selesai
                                    </button>
                                </form>
                                
                            @else
                                {{-- DISABLED (SESUAI FIGMA) --}}
                                <button class="px-6 py-2 bg-gray-300 text-gray-500 rounded-xl shadow cursor-not-allowed">
                                    ✕ Batal
                                </button>

                                <button class="px-6 py-2 bg-gray-300 text-gray-500 rounded-xl shadow cursor-not-allowed">
                                    ✓ Selesai
                                </button>
                            @endif

                            {{-- DETAIL --}}
                            <a href="{{ route('admin.pesanan.show', $p->id_transaksi) }}"
                               class="px-6 py-2 bg-gray-200 rounded-xl shadow hover:bg-gray-300 transition">
                                Detail
                            </a>

                        </div>
                    </div>

                </div>

            @empty
                <p class="text-center text-gray-500 mt-10">Belum ada pesanan.</p>
            @endforelse

        </div>

    </main>

    {{-- SWEETALERT --}}
    <script>
        // Selesai
        document.querySelectorAll('.complete-form button').forEach(btn => {
            btn.addEventListener('click', function() {
                const form = this.closest('form');
                Swal.fire({
                    title: 'Tandai pesanan selesai?',
                    text: 'Tindakan ini tidak dapat dibatalkan.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#16a34a',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Selesaikan!'
                }).then(result => {
                    if (result.isConfirmed) form.submit();
                });
            });
        });

        // Batal
        document.querySelectorAll('.cancel-form button').forEach(btn => {
            btn.addEventListener('click', function() {
                const form = this.closest('form');
                Swal.fire({
                    title: 'Batalkan pesanan?',
                    text: 'Stok menu akan kembali.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Batalkan!'
                }).then(result => {
                    if (result.isConfirmed) form.submit();
                });
            });
        });
    </script>

</body>
</html>

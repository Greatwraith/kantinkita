<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pesanan Saya</title>
    <script src="https://cdn.tailwindcss.com"></script>
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
     <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-white-800 font-[Poppins] text-gray-800">

@include('components.navbar')

<h1 class="text-2xl font-semibold mt-8 mb-6 px-8">Pesanan Saya</h1>

@if($pesanan->isEmpty())
    <p class="text-center text-gray-500">Belum ada pesanan 😅</p>
@else
<div class="px-8 mb-10">
    <div class="flex flex-col gap-6">
        @foreach($pesanan as $t)
        <div class="bg-white shadow-md rounded-xl p-6">

            {{-- Tanggal pesanan --}}
            <span class="text-sm text-gray-500">
                {{ $t->created_at ? $t->created_at->format('d M Y, H:i') : '-' }}
            </span>

            {{-- STATUS --}}
            @if($t->status_pesanan === 'menunggu')
                <div class="mt-2 text-orange-600 font-semibold text-sm">Menunggu Konfirmasi Admin</div>
            @elseif($t->status_pesanan === 'completed')
                <div class="mt-2 text-green-600 font-semibold text-sm">✔️ Pesanan Selesai</div>
            @elseif($t->status_pesanan === 'canceled')
                <div class="mt-2 text-red-600 font-semibold text-sm">❌ Pesanan Dibatalkan</div>
            @endif

            {{-- DETAIL ITEM --}}
            @foreach($t->detailTransaksi as $detail)
            <div class="flex items-center justify-between border-t pt-4 mt-4">
                <img src="{{ asset('storage/'.$detail->menu->gambar_menu) }}" alt="{{ $detail->menu->nama_menu }}" class="w-20 h-20 rounded-lg object-cover" />

                <div class="flex-1 ml-4">
                    <h4 class="text-base font-semibold">{{ $detail->menu->nama_menu }}</h4>
                    <p class="text-red-600 font-medium mt-1">Rp {{ number_format($detail->harga_satuan,0,',','.') }}</p>
                </div>

                <div class="text-right text-sm">
                    <span class="block">Jumlah: {{ $detail->jumlah }}</span>
                    <span class="block font-semibold">Subtotal: Rp {{ number_format($detail->sub_total,0,',','.') }}</span>
                </div>
            </div>
            @endforeach

            {{-- TOMBOL DETAIL --}}
            <a href="{{ route('user.pesanan.show', $t->id_transaksi) }}" class="text-blue-600 text-sm font-semibold mt-4 inline-block">
                Lihat Detail →
            </a>

            {{-- TOMBOL BATAL --}}
            @if($t->status_pesanan === 'menunggu')
            <form action="{{ route('user.pesanan.cancel', $t->id_transaksi) }}" method="POST" class="mt-3">
                @csrf
                <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 rounded-lg text-sm">Batalkan Pesanan</button>
            </form>
            @endif

        </div>
        @endforeach
    </div>
</div>
@endif

@include('components.footer')

</body>
</html>

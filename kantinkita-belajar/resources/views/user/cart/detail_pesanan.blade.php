<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Pesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="bg-[#fafafa] text-[#222] font-poppins m-0 p-0">

<header class="bg-white shadow px-[60px] py-5 flex items-center justify-between">
    <nav>
        <a href="{{ route('dashboard') }}" class="mx-5 text-[#e53935] font-medium hover:underline">Beranda</a>
        <a href="{{ route('user.menu.index') }}" class="mx-5 text-[#e53935] font-medium hover:underline">Menu</a>
    </nav>
    <div class="user-circle"></div>
</header>

<div class="max-w-[900px] mx-auto bg-white p-8 mt-9 rounded-[16px] shadow-md">
    <h2 class="text-[24px] font-semibold mb-4">Detail Pesanan</h2>

    <div class="mb-6">
        <div class="text-[15px] my-1">Tanggal Pesanan: 
            <strong>{{ $transaksi->created_at->format('d M Y, H:i') }}</strong>
        </div>

        <div class="text-[15px] my-1">Status Pesanan:</div>

        @if($transaksi->status_pesanan == 'menunggu')
            <span class="inline-block px-3 py-2 text-[14px] font-semibold rounded-[8px] bg-[#fff3cd] text-[#b8860b] mt-2">
                Menunggu Konfirmasi Admin
            </span>

        @elseif($transaksi->status_pesanan == 'completed')
            <span class="inline-block px-3 py-2 text-[14px] font-semibold rounded-[8px] bg-[#c8e6c9] text-[#2e7d32] mt-2">
                ✔️ Pesanan Selesai
            </span>

        @elseif($transaksi->status_pesanan == 'canceled')
            <span class="inline-block px-3 py-2 text-[14px] font-semibold rounded-[8px] bg-[#ffcdd2] text-[#c62828] mt-2">
                ❌ Pesanan Dibatalkan
            </span>
        @endif
    </div>

    <h3 class="mt-6 text-[18px] font-semibold">Item Pesanan</h3>

    @foreach($transaksi->detailTransaksi as $detail)
    <div class="flex items-center justify-between border-t border-gray-200 py-4">
        <img src="{{ asset('storage/'.$detail->menu->gambar_menu) }}" alt="" class="w-[80px] h-[80px] rounded-[12px] object-cover">
        <div class="flex-1 ml-4">
            <h4 class="text-[16px] font-semibold m-0">{{ $detail->menu->nama_menu }}</h4>
            <p class="text-[#e53935] font-medium mt-1 mb-0">Rp {{ number_format($detail->harga_satuan,0,',','.') }}</p>
        </div>
        <div class="text-right">
            <div>Jumlah : {{ $detail->jumlah }}</div>
            <div>Subtotal : Rp {{ number_format($detail->sub_total,0,',','.') }}</div>
        </div>
    </div>
    @endforeach

    <div class="text-right mt-5 text-[17px] font-semibold text-[#d32f2f]">
        Total : Rp {{ number_format($transaksi->detailTransaksi->sum('sub_total'),0,',','.') }}
    </div>

    <a href="{{ route('user.pesanan.index') }}" class="inline-block mt-6 px-5 py-2 bg-gray-500 text-white font-semibold rounded-[8px] hover:bg-gray-700">← Kembali</a>

    @if($transaksi->status_pesanan === 'menunggu')
    <form action="{{ route('user.pesanan.cancel', $transaksi->id_transaksi ) }}" method="POST" class="mt-6">
        @csrf
        <button type="submit" class="w-full bg-[#f57c00] text-white font-semibold py-3 rounded-[8px] hover:bg-[#ef6c00]">
            Batalkan Pesanan
        </button>
    </form>
    @endif
</div>

</body>
</html>

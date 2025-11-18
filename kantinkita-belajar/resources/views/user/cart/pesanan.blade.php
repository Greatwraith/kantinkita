<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pesanan Saya</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fafafa;
            color: #222;
            margin: 0;
            padding: 0;
        }
        header {
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            padding: 20px 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        header nav a {
            margin: 0 20px;
            color: #e53935;
            font-weight: 500;
            text-decoration: none;
        }
        header nav a:hover { text-decoration: underline; }
        h1 { text-align: left; margin: 30px 60px; font-size: 28px; font-weight: 600; }
        .container { display: flex; justify-content: space-between; margin: 0 60px 60px; gap: 30px; }
        .left { flex: 2; }

        .item-box {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-top: 25px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.08);
        }
        .item { display: flex; align-items: center; justify-content: space-between;
            border-top: 1px solid #eee; padding-top: 15px; margin-top: 15px; }
        .item img { width: 70px; height: 70px; border-radius: 10px; object-fit: cover; }
        .item-info { flex: 1; margin-left: 15px; }
        .item-info h4 { margin: 0; font-size: 16px; font-weight: 600; }
        .item-info p { color: #d32f2f; font-weight: 500; margin-top: 4px; }
        .item-summary { text-align: right; font-size: 15px; }
        .item-summary span { display: block; }

        .btn-cancel {
            width: 100%;
            border: none;
            border-radius: 8px;
            padding: 12px;
            margin-top: 12px;
            font-weight: 600;
            cursor: pointer;
            font-size: 15px;
            background: #f57c00;
            color: white;
        }
        .btn-cancel:hover { background: #ef6c00; }
    </style>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
</head>
<body>

<header>
    <nav>
        <a href="#">Beranda</a>
        <a href="{{ route('user.menu.index') }}">Menu</a>
    </nav>
    <div class="user-circle">A</div>
</header>

<h1>Pesanan Saya</h1>

@if($pesanan->isEmpty())
    <p style="text-align:center; color:#999;">Belum ada pesanan 😅</p>
@else
<div class="container">
    <div class="left">
        @foreach($pesanan as $t)
        <div class="item-box">

            {{-- Tanggal pesanan --}}
            <span style="font-size:13px; color:#666;">
                {{ $t->created_at ? $t->created_at->format('d M Y, H:i') : '-' }}
            </span>

            {{-- STATUS --}}
            @if($t->status_pesanan === 'menunggu')
                <div style="margin-top:6px; font-size:14px; font-weight:600; color:#f57c00;">
                    Menunggu Konfirmasi Admin
                </div>
            @elseif($t->status_pesanan === 'completed')
                <div style="margin-top:6px; font-size:14px; font-weight:600; color:#43a047;">
                    ✔️ Pesanan Selesai
                </div>
            @elseif($t->status_pesanan === 'canceled')
                <div style="margin-top:6px; font-size:14px; font-weight:600; color:#e53935;">
                    ❌ Pesanan Dibatalkan
                </div>
            @endif

            {{-- DETAIL ITEM --}}
            @foreach($t->detailTransaksi as $detail)
            <div class="item">
                <img src="{{ asset('storage/'.$detail->menu->gambar_menu) }}" alt="{{ $detail->menu->nama_menu }}">
                <div class="item-info">
                    <h4>{{ $detail->menu->nama_menu }}</h4>
                    <p>Rp {{ number_format($detail->harga_satuan,0,',','.') }}</p>
                </div>
                <div class="item-summary">
                    <span>Jumlah: {{ $detail->jumlah }}</span>
                    <span>Subtotal: Rp {{ number_format($detail->sub_total,0,',','.') }}</span>
                </div>
            </div>
            @endforeach

            {{-- TOMBOL DETAIL --}}
            <a href="{{ route('user.pesanan.show', $t->id_transaksi) }}"
                style="font-size:14px; color:#1976d2; text-decoration:none; font-weight:600; display:block; margin-top:12px;">
                Lihat Detail →
            </a>

            {{-- TOMBOL BATAL --}}
            @if($t->status_pesanan === 'menunggu')
            <form action="{{ route('user.pesanan.cancel', $t->id_transaksi) }}" method="POST">
                @csrf
                <button type="submit" class="btn-cancel">Batalkan Pesanan</button>
            </form>
            @endif

        </div>
        @endforeach
    </div>
</div>
@endif

</body>
</html>

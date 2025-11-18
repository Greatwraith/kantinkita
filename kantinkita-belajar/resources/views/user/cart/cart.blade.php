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

        header img {
            height: 45px;
        }

        header nav a {
            margin: 0 20px;
            color: #e53935;
            font-weight: 500;
            text-decoration: none;
        }

        header nav a:hover {
            text-decoration: underline;
        }

        h1 {
            text-align: left;
            margin: 30px 60px;
            font-size: 28px;
            font-weight: 600;
        }

        .container {
            display: flex;
            justify-content: space-between;
            margin: 0 60px 60px;
            gap: 30px;
        }

        /* Bagian kiri (item pesanan) */
        .left {
            flex: 2;
        }

        .user-card {
            background: #d32f2f;
            color: white;
            padding: 18px 25px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 15px;
            font-weight: 500;
        }

        .user-card img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: white;
            object-fit: cover;
        }

        .item-box {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-top: 25px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.08);
        }

        .item-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid #eee;
            padding-top: 15px;
            margin-top: 15px;
        }

        .item img {
            width: 70px;
            height: 70px;
            border-radius: 10px;
            object-fit: cover;
        }

        .item-info {
            flex: 1;
            margin-left: 15px;
        }

        .item-info h4 {
            margin: 0;
            font-size: 16px;
            font-weight: 600;
        }

        .item-info p {
            color: #d32f2f;
            font-weight: 500;
            margin-top: 4px;
        }

        .item-summary {
            text-align: right;
            font-size: 15px;
        }

        .item-summary span {
            display: block;
        }

        .edit-link {
            color: #d32f2f;
            font-weight: 500;
            text-decoration: none;
        }

        .edit-link:hover {
            text-decoration: underline;
        }

        /* Bagian kanan (ringkasan) */
        .right {
            flex: 1;
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.08);
            height: fit-content;
        }

        .right h3 {
            margin-top: 0;
            margin-bottom: 15px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
            font-size: 15px;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            font-weight: 600;
            margin-top: 15px;
            font-size: 16px;
            color: #d32f2f;
        }

        .right button {
            width: 100%;
            border: none;
            border-radius: 8px;
            padding: 12px;
            margin-top: 12px;
            font-weight: 600;
            cursor: pointer;
            font-size: 15px;
        }

        .btn-add {
            background: #e53935;
            color: white;
        }

        .btn-add:hover {
            background: #c62828;
        }

        .btn-confirm {
            background: #3f51b5;
            color: white;
        }

        .btn-confirm:hover {
            background: #303f9f;
        }
    </style>
</head>
<body>

<header>
    {{-- <img src="{{ asset('images/logo.png') }}" alt="Logo Kantin Kita"> --}}
    <nav>
        <a href="#">Beranda</a>
        <a href="{{ route('user.menu.index') }}">Menu</a>
        <a href="#">Tentang Kami</a>
        <a href="#">Ulasan</a>
    </nav>
    <div class="user-circle">A</div>
</header>

<h1>Pesanan saya</h1>

@if($carts->isEmpty())
    <p style="text-align:center; color:#999;">Keranjang kamu masih kosong 😅</p>
@else
<div class="container">
    <div class="left">
        {{-- Kartu User --}}
        <div class="user-card">
            {{-- <img src="{{ asset('images/default_avatar.png') }}" alt="User"> --}}
            <div>
                <div>{{ $carts->first()->user->name }}</div>
                <div>{{ $carts->first()->user->nis }} - {{ $carts->first()->user->kelas }} {{ $carts->first()->user->jurusan }}</div>
            </div>
        </div>

        {{-- Item Pesanan --}}
        <div class="item-box">
            <div class="item-header">
                <span>Item Pesanan</span>
                <a href="{{ route('user.cart.edit', $carts->first()->id_keranjang) }}" class="edit-link">Edit Pesanan</a>
            </div>

            @foreach($carts as $cart)
            <div class="item">
                <img src="{{ asset('storage/'.$cart->menu->gambar_menu) }}" alt="{{ $cart->menu->nama_menu }}">
                <div class="item-info">
                    <h4>{{ $cart->menu->nama_menu }}</h4>
                    <p>Rp {{ number_format($cart->menu->harga_menu,0,',','.') }}</p>
                </div>
                <div class="item-summary">
                    <span>Jumlah: {{ $cart->jumlah }}</span>
                    <span>Subtotal: Rp {{ number_format($cart->total_harga,0,',','.') }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Ringkasan Pesanan --}}
 {{-- Ringkasan Pesanan --}}
<div class="right">
    @php
        $totalItem = $carts->sum('jumlah');
        $totalMenu = $carts->count();   // total jenis menu
        $subtotal = $carts->sum('total_harga');
    @endphp
    <h3>Ringkasan Pesanan</h3>
    
    <div class="summary-row"><span>Total Menu</span><span>{{ $totalMenu }}</span></div> {{-- Tambahan --}}
    <div class="summary-row"><span>Total Item</span><span>{{ $totalItem }}</span></div>
    <div class="summary-row"><span>Subtotal</span><span>Rp {{ number_format($subtotal,0,',','.') }}</span></div>
    <hr>
    <div class="summary-total"><span>Total</span><span>Rp {{ number_format($subtotal,0,',','.') }}</span></div>
    <button class="btn-add" onclick="window.location='{{ route('user.menu.index') }}'">Tambah Pesanan</button>
    <form action="{{ route('user.checkout') }}" method="POST">
        @csrf
        <button type="submit" class="btn-confirm">Konfirmasi Pesanan</button>
    </form>
</div>


@endif

</body>
</html>

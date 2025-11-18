<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Menu</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Poppins', sans-serif; background-color:#f0f0f0; margin:0; padding:20px;">

<a href="{{ route('user.menu.index', ['search' => request('search')]) }}" 
   style="display:inline-block; margin-top:20px; padding:8px 12px; border-radius:6px; background-color:#4caf50; color:#fff; text-decoration:none;">
   ← Kembali ke Daftar Menu
</a>


<div style="max-width:800px; margin:0 auto; background-color:#0d1117; color:#fff; padding:20px; border-radius:10px; box-shadow:0 4px 6px rgba(0,0,0,0.2);">
    <h1 style="margin-top:0;">{{ $menu->nama_menu }}</h1>
    
    @if($menu->gambar_menu)
        <img src="{{ asset('storage/' . $menu->gambar_menu) }}" alt="{{ $menu->nama_menu }}" 
             style="width:100%; max-height:400px; object-fit:cover; border-radius:10px; margin-bottom:20px;">
    @endif

    <p><strong>Kategori:</strong> {{ $menu->nama_kategori }}</p>
    <p><strong>Harga:</strong> Rp {{ number_format($menu->harga_menu,0,',','.') }}</p>
    <p><strong>Status:</strong> {{ $menu->status_menu }}</p>
    <p><strong>Stok:</strong> {{ $menu->stok_menu }}</p>
    <p><strong>Deskripsi:</strong></p>
    <p>{{ $menu->deskripsi_menu ?? '-' }}</p>

   <form action="{{ route('user.cart.store', $menu->id_menu) }}" method="POST" style="margin-top:20px;">
    @csrf

    <label for="jumlah"><strong>Pilih jumlah:</strong></label><br>
    <input type="number" name="jumlah" id="jumlah" 
           value="1" min="1" max="{{ $menu->stok_menu }}"
           style="padding:8px; border-radius:6px; border:1px solid #ccc; width:80px; margin-top:5px;">
    <br><br>

    <button type="submit" 
            style="padding:10px 14px; background:#4CAF50; color:#fff; border:none; border-radius:6px; cursor:pointer;">
        Tambah ke Keranjang 🛒
    </button>
</form>

</div>

</body>
</html>

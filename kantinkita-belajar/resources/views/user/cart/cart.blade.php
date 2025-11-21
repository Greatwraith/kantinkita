<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesanan Saya - Kantin Kita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-[#F1F5F2] font-[Poppins]">

{{-- NAVBAR --}}
@include('components.navbar')

{{-- TITLE --}}
<h1 class="text-3xl font-bold mt-10 ml-32">Pesanan saya</h1>

{{-- USER CARD FULL WIDTH --}}
<div class="mx-6 mt-5 bg-[#A00000] text-white p-5 rounded-xl shadow-lg flex items-center gap-4 w-[95%]">

    <img src="https://api.dicebear.com/7.x/bottts-neutral/svg?seed={{ $carts->first()->user->name }}"
         class="w-14 h-14 rounded-full bg-white p-1 shadow">

    <div>
        <div class="text-lg font-semibold">{{ $carts->first()->user->name }}</div>
        <div class="text-sm opacity-90">
            {{ $carts->first()->user->nis }} —
            {{ $carts->first()->user->kelas }}
            {{ $carts->first()->user->jurusan }}
        </div>
    </div>
</div>

{{-- ALERTS --}}
@if(session('success'))
    <div class="mx-6 mt-4 p-4 bg-green-100 text-green-900 border-l-4 border-green-600 rounded-lg">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="mx-6 mt-4 p-4 bg-red-100 text-red-900 border-l-4 border-red-600 rounded-lg">
        {{ session('error') }}
    </div>
@endif

{{-- EMPTY CASE --}}
@if($carts->isEmpty())
    <p class="text-center text-gray-500 text-lg mt-10">Keranjang kamu masih kosong 😅</p>
@else

{{-- MAIN WRAPPER --}}
<div class="flex flex-col lg:flex-row gap-6 mx-6 mt-6 pb-20">

    {{-- LEFT CONTENT (ITEM LIST) --}}
    <div class="flex-1">

        <div class="bg-white rounded-xl shadow p-6 w-full">

            {{-- HEADER --}}
            <div class="flex justify-between mb-6">
                <span class="text-xl font-semibold">Item Pesanan</span>
                <a href="{{ route('user.cart.edit', $carts->first()->id_keranjang) }}"
                   class="text-[#A00000] font-medium hover:underline">
                    Edit Pesanan
                </a>
            </div>

            {{-- ITEM CARDS --}}
            @foreach($carts as $cart)
            <div class="flex items-center justify-between p-3 mb-3 border rounded-2xl shadow-sm bg-white w-full">

                {{-- FOTO + NAMA --}}
                <div class="flex items-center gap-4 flex-grow">

                    <img src="{{ asset('storage/'.$cart->menu->gambar_menu) }}"
                         class="w-20 h-20 rounded-xl object-cover shadow">

                    <div>
                        <h4 class="font-semibold text-gray-900 text-lg">
                            {{ $cart->menu->nama_menu }}
                        </h4>

                        <p class="text-[#A00000] font-semibold text-sm">
                            Rp {{ number_format($cart->menu->harga_menu,0,',','.') }}
                        </p>
                    </div>

                </div>

                {{-- JUMLAH + SUBTOTAL --}}
                <div class="flex flex-col w-56">

                    {{-- LABEL --}}
                    <div class="flex justify-between text-sm text-gray-600 font-medium mb-1">
                        <span>Jumlah</span>
                        <span>Subtotal</span>
                    </div>

                    {{-- DATA --}}
                    <div class="flex justify-between items-center">

                        <p class="text-xl font-semibold text-gray-900">
                            {{ $cart->jumlah }}
                        </p>

                        <p class="text-xl font-semibold text-[#A00000]">
                            Rp {{ number_format($cart->total_harga,0,',','.') }}
                        </p>

                    </div>

                </div>

            </div>
            @endforeach

        </div>

    </div>

    {{-- RIGHT SIDEBAR SUMMARY --}}
    <div class="bg-white p-6 shadow rounded-xl w-full lg:w-80 h-fit">

        @php
            $totalItem = $carts->sum('jumlah');
            $totalMenu = $carts->count();
            $subtotal = $carts->sum('total_harga');
        @endphp

        <h3 class="text-xl font-semibold mb-4">Ringkasan Pesanan</h3>

        <div class="space-y-2 text-sm">
            <div class="flex justify-between"><span>Total Menu</span><span>{{ $totalMenu }}</span></div>
            <div class="flex justify-between"><span>Total Item</span><span>{{ $totalItem }}</span></div>
            <div class="flex justify-between"><span>Subtotal</span><span>Rp {{ number_format($subtotal,0,',','.') }}</span></div>
        </div>

        <div class="border-t my-4"></div>

        <div class="flex justify-between text-lg font-bold text-[#A00000] mb-4">
            <span>Total</span>
            <span>Rp {{ number_format($subtotal,0,',','.') }}</span>
        </div>

        <button onclick="window.location='{{ route('user.menu.index') }}'"
                class="w-full py-3 rounded-xl bg-[#A00000] text-white font-semibold hover:bg-red-800 transition">
            Tambah Pesanan
        </button>

        <form action="{{ route('user.checkout') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit"
                    class="w-full py-3 rounded-xl bg-[#3949AB] text-white font-semibold hover:bg-[#303F9F] transition">
                Konfirmasi Pesanan
            </button>
        </form>

    </div>

</div>

@endif

@include('components.footer')

</body>
</html>

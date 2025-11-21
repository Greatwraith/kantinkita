<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Keranjang - Kantin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100 font-poppins">

    @include('components.navbar')

    {{-- Alert --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif


    <div class="max-w-6xl mx-auto mt-8 flex gap-6 mb-24">


        {{-- LEFT: ITEM LIST --}}
        <div class="flex-[3]">

            @if($carts->isEmpty())

                <p class="text-center text-gray-500 mt-8">
                    Keranjang kamu masih kosong 😅
                </p>

            @else

                {{-- FORM UPDATE ALL --}}
                <form action="{{ route('user.cart.updateAll') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="bg-white p-6 rounded-2xl shadow-lg space-y-6">
                        
                        <h2 class="text-2xl font-semibold text-gray-800">
                            Edit Pesanan
                        </h2>

                        @foreach($carts as $cart)

                            <div class="flex items-center justify-between border-t pt-4 first:border-t-0">

                                {{-- IMAGE --}}
                                <img src="{{ asset('storage/'.$cart->menu->gambar_menu) }}"
                                    class="w-24 h-24 object-cover rounded-xl shadow-sm">

                                {{-- INFO --}}
                                <div class="flex-1 ml-6">

                                    <h3 class="font-semibold text-gray-800 text-lg">
                                        {{ $cart->menu->nama_menu }}
                                    </h3>

                                    <p class="text-red-600 font-medium text-md mt-1">
                                        Rp {{ number_format($cart->menu->harga_menu,0,',','.') }}
                                    </p>

                                    {{-- BUTTON QTY --}}
                                    <div class="flex items-center mt-3 gap-2">

                                        <button type="button"
                                            onclick="changeQty({{ $cart->id_keranjang }}, -1)"
                                            class="px-3 py-1 bg-red-600 text-white rounded-lg">
                                            -
                                        </button>

                                        <input type="number"
                                            name="jumlah[{{ $cart->id_keranjang }}]"
                                            id="jumlah-{{ $cart->id_keranjang }}"
                                            value="{{ $cart->jumlah }}"
                                            min="1"
                                            class="w-16 text-center border rounded-lg">

                                        <button type="button"
                                            onclick="changeQty({{ $cart->id_keranjang }}, 1)"
                                            class="px-3 py-1 bg-red-600 text-white rounded-lg">
                                            +
                                        </button>

                                    </div>

                                    {{-- DELETE BUTTON --}}
                                    <button type="button"
                                        onclick="deleteItem({{ $cart->id_keranjang }})"
                                        class="text-red-600 hover:underline mt-2">
                                        Hapus
                                    </button>

                                </div>

                                {{-- SUBTOTAL --}}
                                <div class="text-right">
                                    <p class="text-gray-500 text-sm">Subtotal:</p>
                                    <p class="font-semibold text-gray-800 text-lg">
                                        Rp {{ number_format($cart->total_harga,0,',','.') }}
                                    </p>
                                </div>

                            </div>

                        @endforeach

                        {{-- SAVE BUTTON --}}
                        <button type="submit"
                            class="w-full mt-6 bg-green-600 text-white py-3 rounded-lg hover:bg-green-700">
                            Simpan Semua Perubahan
                        </button>

                    </div>
                </form>

            @endif

        </div>

        {{-- RIGHT SIDEBAR --}}
        @if(!$carts->isEmpty())

            @php
                $totalItem = $carts->sum('jumlah');
                $totalMenu = $carts->count();
                $subtotal  = $carts->sum('total_harga');
            @endphp

            <div class="flex-1 bg-white p-6 rounded-2xl shadow-lg h-fit">

                <h3 class="text-xl font-semibold text-gray-800 mb-4">
                    Ringkasan Pesanan
                </h3>

                <div class="flex justify-between mb-2">
                    <span>Total Menu</span>
                    <span>{{ $totalMenu }}</span>
                </div>

                <div class="flex justify-between mb-2">
                    <span>Total Item</span>
                    <span>{{ $totalItem }}</span>
                </div>

                <div class="flex justify-between mb-2">
                    <span>Subtotal</span>
                    <span>Rp {{ number_format($subtotal,0,',','.') }}</span>
                </div>

                <hr class="my-3">

                <div class="flex justify-between font-semibold text-red-600 text-lg mb-4">
                    <span>Total</span>
                    <span>Rp {{ number_format($subtotal,0,',','.') }}</span>
                </div>

                <button onclick="window.location='{{ route('user.menu.index') }}'"
                    class="w-full bg-red-600 text-white py-3 rounded-lg hover:bg-red-700 transition mb-2">
                    Tambah Pesanan
                </button>

                <button onclick="window.location='{{ route('user.cart.index') }}'"
                    class="w-full bg-gray-500 text-white py-3 rounded-lg hover:bg-gray-600 transition">
                    Kembali ke Keranjang
                </button>

            </div>

        @endif

    </div>


    {{-- DELETE FORMS --}}
    @foreach($carts as $cart)
        <form id="delete-form-{{ $cart->id_keranjang }}"
            action="{{ route('user.cart.destroy', $cart->id_keranjang) }}"
            method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    @endforeach


    {{-- SCRIPT --}}
    <script>
        function changeQty(id, delta) {
            let input = document.getElementById('jumlah-' + id);
            let value = parseInt(input.value) + delta;
            if (value >= 1) input.value = value;
        }

        function deleteItem(id) {
            document.getElementById('delete-form-' + id).submit();
        }
    </script>

    @include('components.footer')

</body>
</html>

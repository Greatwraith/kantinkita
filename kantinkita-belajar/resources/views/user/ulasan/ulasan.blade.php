<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan Pelanggan</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: "Poppins", sans-serif; }
    </style>
</head>

<body class="bg-gray-100">

    <!-- HEADER -->
    @include('components.navbar')

    <br>
  <header class="bg-white shadow p-4 mb-6 flex items-center justify-between">
    <h1 class="text-xl font-semibold text-gray-800">Ulasan Pelanggan</h1>

   @php
   $myUlasan = \App\Models\Ulasan::where('id_user', auth()->user()->id_user)->first();
@endphp

@if($myUlasan)
    <a href="{{ route('ulasan.edit') }}" 
       class="bg-green-600 text-white px-4 py-2 rounded-lg font-semibold">
        Edit Ulasan Saya
    </a>
@else
    <a href="{{ route('ulasan.create') }}" 
       class="bg-red-600 text-white px-4 py-2 rounded-lg font-semibold">
        Tulis Ulasan
    </a>
@endif

</header>


    <div class="max-w-4xl mx-auto px-4">

        <h2 class="text-2xl font-bold mb-4 text-gray-700">Semua Ulasan</h2>

        @if($ulasans->isEmpty())
            <div class="bg-white shadow rounded-xl p-6 text-center text-gray-500">
                Belum ada ulasan.
            </div>
        @else
            <div class="space-y-4">
                @foreach($ulasans as $ulasan)
                <div class="bg-white shadow rounded-xl p-5 flex gap-4">

                    <!-- Foto User -->
                    <div>
                        <div class="w-14 h-14 bg-gray-300 rounded-full flex items-center justify-center text-white text-lg">
                            {{ strtoupper(substr($ulasan->user?->name ?? 'U', 0, 1)) }}
                        </div>
                    </div>

                    <!-- Isi ulasan -->
                    <div class="flex-1">
                        <!-- Header: Nama, Kelas/Jurusan, Tanggal & Rating -->
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="font-semibold text-gray-800 text-lg">
                                    {{ $ulasan->user?->name ?? 'User tidak ditemukan' }}
                                </h3>
                                <span class="text-sm text-gray-500">
                                    {{ $ulasan->user?->kelas ?? '-' }} {{ $ulasan->user?->jurusan ?? '-' }}
                                </span>
                                <div class="text-xs text-gray-400 mt-1">
                                    {{ $ulasan->created_at->format('d M Y') }}
                                </div>
                            </div>

                            <!-- Rating di kanan -->
                            <div class="flex items-center">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $ulasan->rating)
                                        <span class="text-yellow-400 text-xl">★</span>
                                    @else
                                        <span class="text-gray-300 text-xl">★</span>
                                    @endif
                                @endfor
                            </div>
                        </div>

                       <!-- Gambar jika ada -->
@if($ulasan->gambar)
    <img 
        src="{{ asset('storage/' . $ulasan->gambar) }}" 
        alt="Gambar Ulasan" 
        class="mt-3 rounded-lg max-h-20 max-w-full object-cover"
    >
@endif


                        <!-- Komentar -->
                        <p class="mt-2 text-gray-700">
                            {{ $ulasan->ulasan }}
                        </p>

                    </div>
                </div>
                @endforeach
            </div>
        @endif

    </div>

    <div class="py-10"></div>

</body>
</html>

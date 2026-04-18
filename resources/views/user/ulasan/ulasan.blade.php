@php
    $myUlasan = \App\Models\Ulasan::where('id_user', auth()->user()->id_user)->first();
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ulasan Pelanggan</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>

    <style>
        body { font-family: "Poppins", sans-serif; }
    </style>
</head>
<body class="bg-gray-100">

@include('components.navbar')

<div class="max-w-6xl mx-auto px-4 mt-10">

  
    <!-- RATING SUMMARY SECTION -->
    <div class=" p-8 mb-12">
        <div class="flex gap-10">

            <!-- Rating Score -->
            <div class="flex flex-col items-center justify-center w-1/3">
                <h1 class="text-6xl font-bold text-gray-800">5.0</h1>
                <div class="flex text-yellow-400 text-3xl gap-1 mt-2">
                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                </div>
                <p class="text-gray-500 mt-1">({{ $total }} ulasan)</p>
            </div>

            <!-- Rating Bars -->
            <div class="flex-1 space-y-3">
                @foreach([5,4,3,2,1] as $star)
                    @php
                        $percentage = $total > 0 ? ($counts[$star] / $total * 100) : 0;
                    @endphp
                    <div class="flex items-center gap-4">
                        <span class="w-10 text-gray-600">{{ $star }} Star</span>
                        <div class="flex-1 bg-gray-200 h-3 rounded-full overflow-hidden">
                            <div class="bg-[#5B5FAF] h-full" style="width: {{ $percentage }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        
    </div>

     <p>Ulasan Saya <br><br></p>

   

    @if($myUlasan)
<div class="bg-white shadow rounded-2xl p-6 mb-10">

    <div class="flex gap-4">
        <img src="https://ui-avatars.com/api/?name={{ urlencode($myUlasan->user->name) }}" 
             class="w-16 h-16 rounded-full" />

        <div class="flex-1">

            <!-- Header nama + rating -->
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="font-semibold text-lg text-gray-800">
                        {{ $myUlasan->user->name }}
                    </h3>
                    <p class="text-gray-500 text-sm">
                        {{ $myUlasan->user->kelas }} {{ $myUlasan->user->jurusan }}
                    </p>
                </div>

                <div class="flex text-yellow-400 text-xl gap-1">
                    @for($i = 1; $i <= 5; $i++)
                        <span class="{{ $i <= $myUlasan->rating ? 'text-yellow-400' : 'text-gray-300' }}">★</span>
                    @endfor
                </div>
            </div>

            <!-- Isi ulasan -->

            @if($myUlasan->gambar)
                <img src="{{ asset('storage/' . $myUlasan->gambar) }}"
                     class="mt-3 rounded-lg max-h-32 object-cover" />
            @endif
            <p class="mt-3 text-gray-700">{{ $myUlasan->ulasan }}</p>

            

        </div>
    </div>

    <!-- Tombol Hapus dan Edit sesuai Figma -->
    <div class="flex justify-end gap-3 mt-5">
        <form action="{{ route('ulasan.destroy') }}" method="POST"
              onsubmit="return confirm('Hapus ulasan ini?');">
            @csrf
            @method('DELETE')
            <button class="flex items-center gap-1 bg-red-600 text-white px-4 py-2 rounded-lg shadow">
                 Hapus
            </button>
        </form>

        <a href="{{ route('ulasan.edit') }}"
           class="flex items-center gap-1 bg-red-600 text-white px-4 py-2 rounded-lg shadow">
          Edit
        </a>
    </div>

</div>
@endif


<br>
<br>

    <!-- FILTER BUTTONS -->
    <div class="flex justify-between items-center mb-8">

        <!-- LEFT FILTERS -->
        <div class="flex gap-3 overflow-x-auto pb-1">

            <a href="{{ route('ulasan.index') }}" class="px-5 py-2 rounded-3xl border border-gray-300 bg-white text-gray-700 text-sm shadow-sm">
                Semua ({{ $total }})
            </a>

            @foreach([5,4,3,2,1] as $star)
                <a href="{{ route('ulasan.index', ['rating' => $star]) }}" class="px-5 py-2 rounded-3xl border border-gray-300 bg-white text-gray-700 text-sm shadow-sm flex items-center gap-1">
                    <span>{{ $star }}</span>
                    <span class="text-yellow-400">★</span>
                    <span>({{ $counts[$star] }})</span>
                </a>
            @endforeach
        </div>

        <!-- BUTTON ULASAN -->
        <div>
            @if($myUlasan)
                <a href="{{ route('ulasan.edit') }}" class="bg-red-600 text-white px-5 py-2 rounded-xl shadow font-semibold whitespace-nowrap">Edit Ulasan Saya</a>
            @else
                <a href="{{ route('ulasan.create') }}" class="bg-red-600 text-white px-5 py-2 rounded-xl shadow font-semibold whitespace-nowrap">Tulis Ulasan</a>
            @endif
        </div>
    </div>


    <!-- LIST ULASAN -->

    @if($ulasans->isEmpty())
        <div class="bg-white shadow rounded-xl p-6 text-center text-gray-500">Belum ada ulasan.</div>
    @else
        <div class="space-y-4">
            @foreach($ulasans as $ulasan)
            <div class="bg-white shadow rounded-2xl p-5 flex gap-4">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($ulasan->user->name) }}" class="w-14 h-14 rounded-full" />

                <div class="flex-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="font-semibold text-gray-800 text-lg">{{ $ulasan->user->name }}</h3>
                            <p class="text-sm text-gray-500">{{ $ulasan->user->kelas }} {{ $ulasan->user->jurusan }}</p>
                            <p class="text-xs text-gray-400 mt-1">{{ $ulasan->created_at->format('d M Y') }}</p>
                        </div>

                        <div class="flex text-yellow-400 text-xl gap-1">
                            @for($i=1;$i<=5;$i++)
                                <span class="{{ $i <= $ulasan->rating ? 'text-yellow-400' : 'text-gray-300' }}">★</span>
                            @endfor
                        </div>
                    </div>

                    @if($ulasan->gambar)
                        <img src="{{ asset('storage/' . $ulasan->gambar) }}" class="mt-3 rounded-lg max-h-24 object-cover" />
                    @endif

                    <p class="mt-3 text-gray-700">{{ $ulasan->ulasan }}</p>
                </div>
            </div>
            @endforeach
        </div>
    @endif

</div>

<div class="py-10"></div>

</body>
</html>
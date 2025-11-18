<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Ulasan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>

<body class="bg-gray-100 min-h-screen">

    @include('components.navbar')
    <br>
    <!-- HEADER -->
    <div class="bg-white shadow-md p-4 flex items-center">
        <a href="{{ route('ulasan.index') }}" class="text-gray-600 hover:text-gray-800">
            ← Kembali
        </a>
        <h1 class="text-xl font-semibold mx-auto">Edit Ulasan</h1>
    </div>

    <div class="max-w-xl mx-auto mt-8 bg-white p-6 rounded-xl shadow-lg">

        <!-- Notifikasi -->
        @if(session('success'))
            <div class="mb-4 p-3 rounded bg-green-100 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-4 p-3 rounded bg-red-100 text-red-700">
                <ul class="list-disc ml-5">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- FORM UPDATE ULASAN -->
        <form action="{{ route('ulasan.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- RATING -->
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Rating</label>

                <div id="ratingStars" class="flex space-x-1 text-3xl cursor-pointer select-none">
                    @for($i = 1; $i <= 5; $i++)
                        <span 
                            data-value="{{ $i }}" 
                            class="star {{ $ulasan->rating >= $i ? 'text-yellow-400' : 'text-gray-300' }}"
                        >★</span>
                    @endfor
                </div>

                <input type="hidden" name="rating" id="ratingInput" value="{{ $ulasan->rating }}" required>
            </div>

            <script>
                const stars = document.querySelectorAll('#ratingStars .star');
                const ratingInput = document.getElementById('ratingInput');

                stars.forEach(star => {
                    star.addEventListener('click', function () {
                        const rating = this.getAttribute('data-value');
                        ratingInput.value = rating;

                        stars.forEach(s => {
                            s.classList.remove('text-yellow-400');
                            s.classList.add('text-gray-300');
                        });

                        for (let i = 0; i < rating; i++) {
                            stars[i].classList.remove('text-gray-300');
                            stars[i].classList.add('text-yellow-400');
                        }
                    });
                });
            </script>

            <!-- ULASAN -->
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Pesan</label>
                <textarea 
                    name="ulasan" 
                    rows="4" 
                    class="w-full border rounded-lg p-3 focus:ring focus:ring-red-300"
                    required>{{ $ulasan->ulasan }}</textarea>
            </div>

            <!-- GAMBAR -->
<div class="mb-4">
    <label class="block mb-1 font-semibold">Unggah Gambar Baru (Opsional)</label>

    <div class="flex items-center gap-3">
        
        <!-- PREVIEW GAMBAR (FOTO LAMA ATAU BARU) -->
        <img id="previewImage"
            src="{{ $ulasan->gambar ? asset('storage/'.$ulasan->gambar) : '' }}"
            class="w-20 h-20 rounded object-cover {{ $ulasan->gambar ? '' : 'hidden' }}">
        
        <!-- KOTAK + -->
        <label for="gambar" 
            class="w-20 h-20 border-2 border-dashed border-gray-300 rounded-lg 
                   flex flex-col items-center justify-center cursor-pointer">
            <span class="text-xl text-gray-400">+</span>
        </label>
    </div>

    <input type="file" id="gambar" name="gambar" accept="image/*" class="hidden">
</div>


           <!-- DUA TOMBOL DI BAWAH (SEJAJAR) -->
<div class="flex gap-3 mt-6">

    <!-- SIMPAN PERUBAHAN -->
    <button type="submit" 
        class="flex-1 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
        Simpan Perubahan
    </button>

</div>
</form> <!-- FORM UPDATE SELESAI DI SINI -->

<!-- FORM HAPUS -->
<form action="{{ route('ulasan.destroy') }}" method="POST" 
      onsubmit="return confirm('Hapus ulasan ini?');" class="mt-3">
    @csrf
    @method('DELETE')

    <button type="submit" 
        class="w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700">
        Hapus Ulasan
    </button>
</form>


            </div>
            <!-- END FLEX BUTTON -->

    </div>


    <script>
    document.getElementById('gambar').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const preview = document.getElementById('previewImage');

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('hidden');
        }
    });
</script>

</body>
</html>

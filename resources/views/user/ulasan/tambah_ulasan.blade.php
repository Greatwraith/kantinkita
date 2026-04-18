<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Ulasan</title>
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
        <h1 class="text-xl font-semibold mx-auto">Tambah Ulasan</h1>
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

        <form action="{{ route('ulasan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

  <!-- RATING -->
<div class="mb-4">
    <label class="block mb-1 font-semibold">Rating</label>

    <div id="ratingStars" class="flex space-x-1 text-3xl cursor-pointer select-none">
        @for($i = 1; $i <= 5; $i++)
            <span data-value="{{ $i }}" class="star text-gray-300">★</span>
        @endfor
    </div>

    <!-- Hidden input untuk menyimpan nilai rating -->
    <input type="hidden" name="rating" id="ratingInput" required>
</div>

<script>
    const stars = document.querySelectorAll('#ratingStars .star');
    const ratingInput = document.getElementById('ratingInput');

    stars.forEach(star => {
        star.addEventListener('click', function () {
            const rating = this.getAttribute('data-value');
            ratingInput.value = rating;

            // Reset semua bintang jadi abu-abu
            stars.forEach(s => {
                s.classList.remove('text-yellow-400');
                s.classList.add('text-gray-300');
            });

            // Mewarnai bintang sesuai rating
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
        <textarea name="ulasan" rows="4" class="w-full border rounded-lg p-3 focus:ring focus:ring-red-300" placeholder="Tulis ulasan Anda..." required></textarea>
    </div>

  <!-- GAMBAR -->
<div class="mb-4">
    <label class="block mb-1 font-semibold">Unggah Gambar (Opsional)</label>

    <label for="gambar" 
        class="w-20 h-20 border-2 border-dashed border-gray-300 rounded-lg 
               flex flex-col items-center justify-center cursor-pointer transition">

        <img id="previewImage" class="w-full h-full object-cover rounded-lg hidden">
        <span id="plusIcon" class="text-xl text-gray-400">+</span>
    </label>

    <input type="file" id="gambar" name="gambar" accept="image/*" class="hidden">
</div>

<script>
document.getElementById('gambar').addEventListener('change', function(event) {
    const preview = document.getElementById('previewImage');
    const plusIcon = document.getElementById('plusIcon');
    const file = event.target.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            plusIcon.classList.add('hidden');
        };

        reader.readAsDataURL(file);
    }
});
</script>




    <!-- BUTTONS -->
<div class="flex justify-between mt-4">
    <!-- BATAL -->
    <a href="{{ route('ulasan.index') }}" 
       class="w-1/2 mr-2 bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 rounded-lg font-semibold text-center transition">
        Batal
    </a>

    <!-- KIRIM ULASAN -->
    <button class="w-1/2 ml-2 bg-red-600 hover:bg-red-700 text-white py-2 rounded-lg font-semibold transition">
        Kirim Ulasan
    </button>
</div>

</form>


    </div>

</body>
</html>

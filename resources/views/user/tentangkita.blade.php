<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- TAILWIND CONFIG UNTUK WARNA CUSTOM -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        merah1: '#c91414',
                        merah2: '#b8141a',
                    }
                }
            }
        }
    </script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <title>Tentang Kita</title>
</head>
<body class="font-poppins">

    @include('components.navbar')



    <!-- ================================ -->
    <!--      COMPONENT: TENTANG KITA     -->
    <!-- ================================ -->
    <div id="tentang-kita" class="w-full bg-gradient-to-b from-merah1 to-merah2 text-white py-24">

        <!-- TITLE & DESCRIPTION -->
        <div class="text-center max-w-4xl mx-auto px-6">
            <h1 class="text-5xl font-extrabold tracking-tight mb-6">
                Tentang Kantin Kita
            </h1>

            <p class="text-lg leading-relaxed opacity-90 font-light">
                Kantin Kita telah menjadi jantung kehidupan sekolah SMK Telkom Banjarbaru selama lebih dari 10 tahun.
                Kami berkomitmen menyediakan makanan berkualitas tinggi dengan harga terjangkau
                untuk seluruh keluarga besar sekolah.
            </p>

            <p class="text-lg leading-relaxed opacity-90 font-light mt-5">
                Dengan suasana yang hangat dan ramah, kantin kami tidak hanya menjadi tempat makan,
                tetapi juga tempat berkumpul dan bersosialisasi bagi siswa, guru, dan staff.
                Setiap hidangan disiapkan dengan penuh cinta dan perhatian terhadap kebersihan
                serta gizi seimbang.
            </p>
        </div>

        <!-- CONTENT WRAPPER -->
        <div class="mt-20 grid grid-cols-1 lg:grid-cols-2 gap-12 px-10 lg:px-24">

            <!-- LEFT: IMAGE GRID -->
            <div class="grid grid-cols-2 gap-6">
                <img src="/images/interiorkantin.png" class="w-full h-44 rounded-xl object-cover shadow-lg">
                <img src="/images/tampakluar.png" class="w-full h-44 rounded-xl object-cover shadow-lg">
                <img src="/images/icecream.png" class="w-full h-44 rounded-xl object-cover shadow-lg">
                <img src="/images/orangbelanja.png" class="w-full h-44 rounded-xl object-cover shadow-lg">
            </div>

            <!-- RIGHT: FEATURES LIST -->
            <div class="flex flex-col justify-center pl-2">

                <div class="mb-10">
                    <h3 class="text-2xl font-semibold tracking-tight flex items-start gap-3">
                        <x-iconpark-correct class="w-6 h-6" />
                        Menu Lengkap
                    </h3>
                    <p class="text-white/80 mt-2 leading-relaxed text-base">
                        Berbagai pilihan makanan dan minuman lezat tersedia, siap memanjakan selera Anda
                        dengan cita rasa terbaik.
                    </p>
                </div>

                <div class="mb-10">
                    <h3 class="text-2xl font-semibold tracking-tight flex items-start gap-3">
                        <x-iconpark-correct class="w-6 h-6" />
                        Hemat Waktu
                    </h3>
                    <p class="text-white/80 mt-2 leading-relaxed text-base">
                        Tidak perlu antre lama, cukup pesan melalui website dan pesanan Anda langsung diproses.
                    </p>
                </div>

                <div class="mb-10">
                    <h3 class="text-2xl font-semibold tracking-tight flex items-start gap-3">
                        <x-iconpark-correct class="w-6 h-6" />
                        Harga Terjangkau
                    </h3>
                    <p class="text-white/80 mt-2 leading-relaxed text-base">
                        Harga ramah di kantong tanpa mengurangi kualitas rasa makanan.
                    </p>
                </div>

                <div class="flex justify-end mt-8">
                    <a href="https://wa.me/12345678910"
                    class="inline-flex items-center gap-2 border-2 border-white text-white py-1 px-12 
                            font-semibold text-base tracking-tight rounded-xl
                            hover:bg-white hover:text-merah2 transition">
                        <x-grommet-phone class="w-6 h-6" />
                        Hubungi Kami
                    </a>
                </div>

            </div>
        </div>

    </div>


    <hr>

    @include('components.footer')



</body>
</html>

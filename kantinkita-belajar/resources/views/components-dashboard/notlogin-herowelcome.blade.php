<div class="w-full bg-white pt-16 pb-20 px-6 lg:px-20 font-poppins min-h-screen flex items-center">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center w-full">

        {{-- LEFT — ILLUSTRATION --}}
        <div class="flex justify-center">
            <img 
                {{-- src="{{ asset('images/chef-illustration.png') }}"  --}}
                alt="Chef"
                class="w-[350px] lg:w-[430px]"
            >
        </div>

        {{-- RIGHT — TEXT CONTENT --}}
        <div class="space-y-5">

            <h1 class="text-4xl md:text-4xl font-bold text-gray-900 leading-tight">
                Selamat Datang di Kantin Kita
            </h1>

          <h2 class="text-5xl md:text-6xl font-extrabold text-[#b8141a] leading-tight">
    Dari Kita, Untuk Kita!
</h2>


            <p class="text-gray-600 text-lg">
                Menyajikan makanan segar, sehat, dan lezat untuk keluarga besar SMK Telkom 
                Banjarbaru. Tempat berkumpul favorit siswa dengan suasana hangat dan pelayanan terbaik.
            </p>

            {{-- BUTTONS --}}
            <div class="flex items-center gap-4 pt-2">
                <a href="/menu" 
                   class="px-6 py-3 bg-[#b8141a] hover:bg-[#9a0f14] text-white rounded-lg font-semibold transition">
                    Lihat Menu
                </a>

                <a href="/about" 
                   class="px-6 py-3 border border-[#b8141a] text-[#b8141a] hover:bg-[#b8141a] hover:text-white rounded-lg font-semibold transition">
                    Pelajari Lebih Lanjut
                </a>
            </div>

        </div>

    </div>
</div>

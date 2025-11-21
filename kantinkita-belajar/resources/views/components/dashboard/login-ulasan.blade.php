<!-- ================================ -->
<!--   COMPONENT: NOT LOGIN ULASAN    -->
<!-- ================================ -->
<div id="ulasan" class="w-full py-24 bg-white font-poppins">

    <!-- TITLE -->
    <div class="text-center mb-14">
        <h1 class="text-4xl font-bold text-gray-900">Apa Kata Mereka</h1>
        <p class="text-lg text-gray-600 mt-3">
            Dengarkan pengalaman siswa-siswa yang sudah merasakan kemudahan Kantin Kita
        </p>
    </div>

    <!-- GRID REVIEWS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 px-10">

        <!-- CARD 1 -->
        <div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100">
            <div class="flex items-center gap-3 mb-4">
                <x-heroicon-s-user-circle class="w-6 h-6"/>
                <div>
                    <h3 class="font-semibold text-gray-900">Azka Azkya Alifatunnisa</h3>
                    <p class="text-sm text-gray-600">XI D RPL</p>
                </div>
            </div>

            <div class="text-yellow-400 text-lg mb-2">★★★★★</div>
            <p class="text-gray-700 text-sm leading-relaxed">
                Bener-bener ngebantu banget pas jam istirahat yang singkat, bisa order duluan dari kelas.
            </p>
        </div>

        <!-- CARD 2 -->
        <div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100">
            <div class="flex items-center gap-3 mb-4">
                <x-heroicon-s-user-circle class="w-6 h-6"/>
                <div>
                    <h3 class="font-semibold text-gray-900">Muhammad Farrel</h3>
                    <p class="text-sm text-gray-600">XI D RPL</p>
                </div>
            </div>

            <div class="text-yellow-400 text-lg mb-2">★★★★★</div>
            <p class="text-gray-700 text-sm leading-relaxed">
                Akhirnya kantin sekolah punya sistem modern juga, rasanya kayak pakai aplikasi GoFood versi sekolah!
            </p>
        </div>

        <!-- CARD 3 -->
        <div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100">
            <div class="flex items-center gap-3 mb-4">
                 <x-heroicon-s-user-circle class="w-6 h-6"/>
                <div>
                    <h3 class="font-semibold text-gray-900">Giska Nur Maulida</h3>
                    <p class="text-sm text-gray-600">XI D RPL</p>
                </div>
            </div>

            <div class="text-yellow-400 text-lg mb-2">★★★★★</div>
            <p class="text-gray-700 text-sm leading-relaxed">
                Langganan setiap istirahat hehe, nagih! Kalian wajib coba sih. 😋
            </p>
        </div>

        <!-- CARD 4 -->
        <div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100"> 
            <div class="flex items-center gap-3 mb-4">
                <x-heroicon-s-user-circle class="w-6 h-6"/>
                <div>
                    <h3 class="font-semibold text-gray-900">Aksara Al Fathi</h3>
                    <p class="text-sm text-gray-600">XI D RPL</p>
                </div>
            </div>

            <div class="text-yellow-400 text-lg mb-2">★★★★★</div>
            <p class="text-gray-700 text-sm leading-relaxed">
                Suka banget fitur riwayat pesanan, jadi tahu udah berapa kali beli burger tiap minggu 😂
            </p>
        </div>

    </div>

    <!-- BUTTON: NOT LOGIN → REDIRECT TO LOGIN -->
    <div class="flex justify-center mt-14">
        <a href="/ulasan"
           class="bg-[#4a5280] text-white py-3 px-10 rounded-xl font-semibold hover:bg-[#3d446b] transition">
            Lihat Semua Ulasan
        </a>
    </div>

</div>

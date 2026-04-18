<footer class="bg-[#b51c1c] text-white pt-12 pb-0 font-poppins">

    <div class="max-w-7xl mx-auto px-6 lg:px-12 grid grid-cols-1 md:grid-cols-3 gap-10">

        {{-- LOGO + DESKRIPSI --}}
        <div>
            <div class="flex items-center gap-3 mb-4">
                <img src="{{ asset('images/logotelkomputih.png') }}" class="w-12" alt="Logo">
                <div class="text-xl font-semibold leading-tight">
                    Kantin Kita <br>
                    <span class="text-sm font-normal">SMK Telkom Banjarbaru</span>
                </div>
            </div>

            <p class="leading-relaxed text-sm">
                Menyajikan makanan segar, sehat, dan lezat untuk keluarga besar SMK Telkom Banjarbaru.
                Tempat berkumpul favorit dengan suasana hangat dan pelayanan terbaik.
            </p>
        </div>

        {{-- INFORMASI KONTAK --}}
        <div>
            <h3 class="text-xl font-semibold mb-4">Informasi Kontak</h3>

            <p class="font-semibold">Alamat</p>
            <p class="text-sm mb-4">
                Jl. Pangeran Suriansyah No.3 <br>
                Kec. Banjarbaru Utara, 70711 <br>
                Kalimantan Selatan
            </p>

            <p class="font-semibold">Telepon</p>
            <p class="text-sm">(1234) 5678–910</p>
        </div>

        {{-- JAM OPERASIONAL + SOSMED --}}
        <div>
            <h3 class="text-xl font-semibold mb-4">Jam Operasional</h3>

            <div class="flex justify-between text-sm mb-2">
                <p>Senin – Kamis</p>
                <p>08.00 - 14.30</p>
            </div>

            <div class="flex justify-between text-sm mb-2">
                <p>Jum’at</p>
                <p>08.00 - 11.45</p>
            </div>

            <div class="flex justify-between text-sm mb-6">
                <p>Sabtu – Minggu</p>
                <p class="font-semibold">Tutup</p>
            </div>

            <p class="font-semibold mb-2">Ikuti Kami</p>
            <a href="https://www.instagram.com/smktelkombanjarbaru/?hl=en" target="_blank" class="inline-block text-white hover:opacity-80">
                {{-- Instagram Icon --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M10.5 3h3a7.5 7.5 0 017.5 7.5v3a7.5 7.5 0 01-7.5 7.5h-3A7.5 7.5 0 013 13.5v-3A7.5 7.5 0 0110.5 3z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                    <circle cx="17.25" cy="6.75" r="0.75" fill="currentColor" />
                </svg>
            </a>
        </div>

        <br> <br>

    </div>

   {{-- COPYRIGHT FULL WIDTH --}}
<div class="bg-white text-gray-500 mt-12 py-4 border-t border-white/20 w-full">

    <div class="px-6 lg:px-12 w-full 
                flex flex-col md:flex-row justify-between items-center text-sm">

        {{-- KIRI (UJUNG KIRI LAYAR) --}}
        <p class="text-left w-full md:w-auto">
            2024 Kantin Kita - SMK Telkom Banjarbaru. All rights reserved.
        </p>

        {{-- KANAN (UJUNG KANAN LAYAR) --}}
        <div class="flex gap-6 mt-2 md:mt-0 w-full md:w-auto md:justify-end">
            <a href="#" class="hover:underline">Privacy Policy</a>
            <a href="#" class="hover:underline">Terms of Service</a>
            <a href="#" class="hover:underline">Food Safety</a>
        </div>

    </div>

</div>



    </div>
</div>


</footer>

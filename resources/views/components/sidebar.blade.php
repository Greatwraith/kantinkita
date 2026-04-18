<div class="w-72 bg-[#a50510] text-white min-h-screen flex flex-col">

    <!-- Logo Section -->
    <div class="flex items-center gap-3 px-6 py-6 border-b border-white/30">
        <img src="{{ asset('images/logotelkomputih.png') }}"
             alt="Logo" 
             class="w-12 h-12 object-contain">

        <div class="leading-tight">
            <h1 class="text-xl font-bold">Kantin Kita</h1>
            <p class="text-xs">SMK Telkom Banjarbaru</p>
        </div>
    </div>

    <!-- MENU -->
    <nav class="flex-1 mt-4">

        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center px-6 py-3 hover:bg-[#7a030b] rounded-lg mx-2 transition {{ request()->routeIs('admin.dashboard') ? 'bg-[#7a030b] shadow-lg' : '' }}">
            <x-bxs-home class="w-5 h-5"/>
            <span class="ml-3 font-semibold">Beranda</span>
        </a>

        <a href="{{ route('admin.pesanan.index') }}"
           class="flex items-center px-6 py-3 hover:bg-[#7a030b] rounded-lg mx-2 transition {{ request()->routeIs('admin.pesanan.*') ? 'bg-[#7a030b] shadow-lg' : '' }}">
            <x-solar-clipboard-list-bold class="w-5 h-5"/>
            <span class="ml-3 font-semibold">Pesanan</span>
        </a>

        <a href="{{ route('admin.menu.index') }}"
           class="flex items-center px-6 py-3 hover:bg-[#7a030b] rounded-lg mx-2 transition {{ request()->routeIs('admin.menu.*') ? 'bg-[#7a030b] shadow-lg' : '' }}">
            <x-bi-fork-knife class="w-5 h-5"/>
            <span class="ml-3 font-semibold">Menu</span>
        </a>

        <a href="{{ route('admin.riwayat') }}"
           class="flex items-center px-6 py-3 hover:bg-[#7a030b] rounded-lg mx-2 transition">
            <x-fas-receipt class="w-5 h-5"/>
            <span class="ml-3 font-semibold">Riwayat Transaksi</span>
        </a>

        <a href="{{ route('admin.profile') }}"
           class="flex items-center px-6 py-3 hover:bg-[#7a030b] rounded-lg mx-2 transition {{ request()->routeIs('admin.profile') ? 'bg-[#7a030b] shadow-lg' : '' }}">
            <x-eva-person class="w-5 h-5" />
            <span class="ml-3 font-semibold">Profil Admin</span>
        </a>

    </nav>

    <!-- GARIS PEMBATAS -->
    <div class="w-full border-t border-white/30 mt-4"></div>

    <!-- LOGOUT (BOTTOM FIXED AREA) -->
    <a href="{{ route('logout') }}"
       class="flex justify-between items-center px-6 py-4 text-white hover:bg-[#7a030b] transition">

        <span class="text-lg font-semibold">Log Out</span>

        <!-- Icon Logout -->
        <svg xmlns="http://www.w3.org/2000/svg"
             class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" />
        </svg>
    </a>

</div>

<div class="w-72 bg-[#a50510] text-white min-h-screen flex flex-col">
    <!-- Logo Section -->
    <div class="flex flex-col items-center py-6 border-b border-white/30">
        {{-- <img src="{{ asset('images/logo-telkom.png') }}" alt="Logo" class="w-16 mb-2"> --}}
        <h1 class="text-2xl font-bold">Kantin Kita</h1>
        <p class="text-sm">SMK Telkom Banjarbaru</p>
    </div>

    <!-- Menu Section -->
    <nav class="flex-1 mt-4">
        <!-- Beranda -->
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center px-6 py-3 hover:bg-[#7a030b] transition rounded-lg mx-2 {{ request()->routeIs('admin.dashboard') ? 'bg-[#7a030b] shadow-lg' : '' }}">
            <x-bxs-home class="w-5 h-5"/>
            <span class="ml-3 font-semibold">Beranda</span>
        </a>

        <!-- Pesanan -->
        <a href="{{ route('admin.pesanan.index') }}"
           class="flex items-center px-6 py-3 hover:bg-[#7a030b] transition rounded-lg mx-2 {{ request()->routeIs('admin.pesanan.*') ? 'bg-[#7a030b] shadow-lg' : '' }}">
            <x-solar-clipboard-list-bold class="w-5 h-5"/>
            <span class="ml-3 font-semibold">Pesanan</span>
        </a>

        <!-- Menu -->
        <a href="{{ route('admin.menu.index') }}"
           class="flex items-center px-6 py-3 hover:bg-[#7a030b] transition rounded-lg mx-2 {{ request()->routeIs('admin.menu.*') ? 'bg-[#7a030b] shadow-lg' : '' }}">
            <x-bi-fork-knife class="w-5 h-5"/>
            <span class="ml-3 font-semibold">Menu</span>
        </a>

        <!-- Riwayat Transaksi -->
        <a href="{{ route('admin.riwayat') }}"
           class="flex items-center px-6 py-3 hover:bg-[#7a030b] transition rounded-lg mx-2">
            <x-fas-receipt class="w-5 h-5"/>
            <span class="ml-3 font-semibold">Riwayat Transaksi</span>
        </a>

        <!-- Profil Admin -->
        <a href="#"
           class="flex items-center px-6 py-3 hover:bg-[#7a030b] transition rounded-lg mx-2">
            <x-eva-person class="w-5 h-5" />
            <span class="ml-3 font-semibold">Profil Admin</span>
        </a>
    </nav>
</div>



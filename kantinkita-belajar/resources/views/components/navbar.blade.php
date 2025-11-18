<!-- resources/views/components/navbar.blade.php -->

<!-- NAVBAR -->
<nav class="flex items-center justify-between px-8 py-4 bg-white shadow-sm">
    
    <!-- Logo -->
    <div class="flex items-center gap-3">
        {{-- <img src="{{ asset('logo.png') }}" alt="Logo Kantin Kita" class="w-10"> --}}
        <div>
            <h1 class="font-bold text-lg leading-tight">Kantin Kita</h1>
            <p class="text-xs text-gray-500 -mt-1">SMK Telkom Banjarbaru</p>
        </div>
    </div>

    <!-- Search Bar -->
    <form action="{{ route('user.menu.index') }}" method="GET" class="flex items-center w-1/3 relative">
        <input 
            type="text" 
            name="search"
            placeholder="Cari" 
            value="{{ request('search') }}"
            class="w-full border rounded-full px-4 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-red-400"
        >
        <!-- Ikon pencarian -->
        <svg xmlns="http://www.w3.org/2000/svg" 
             fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
             class="w-5 h-5 absolute left-3 text-gray-400">
            <path stroke-linecap="round" stroke-linejoin="round" 
                  d="M21 21l-4.35-4.35m1.6-5.4a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </form>

    <!-- Menu Navigasi -->
    <div class="flex items-center gap-8 font-medium">
        <a href="{{ route('dashboard') }}" 
           class="{{ Route::is('dashboard') ? 'text-red-600 border-b-2 border-red-600 pb-1' : 'hover:text-red-600 transition-colors' }}">
            Beranda
        </a>
        @auth
<a href="{{ route('user.menu.index') }}" 
   class="{{ Route::is('user.menu.*') ? 'text-red-600 border-b-2 border-red-600 pb-1' : 'hover:text-red-600 transition-colors' }}">
    Menu
</a>

@endauth

        <a href="#" class="hover:text-red-600 transition-colors">Tentang Kami</a>
<a href="{{ route('ulasan.index') }}" 
   class="{{ Route::is('ulasan.index') ? 'text-red-600 border-b-2 border-red-600 pb-1' : 'hover:text-red-600 transition-colors' }}">
    Ulasan
</a>


        <!-- Profile Icon -->
       <a href="{{ route('user.profile') }}">
    <div class="w-10 h-10 rounded-full bg-purple-400 flex items-center justify-center text-white font-bold cursor-pointer">
        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
    </div>
</a>

    </div>
</nav>


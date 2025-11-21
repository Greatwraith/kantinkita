<nav class="flex items-center justify-between px-8 py-4 bg-white shadow-sm">

   <!-- Logo -->
<div class="flex items-center gap-3">

    <!-- LOGO -->
    <img src="{{ asset('images/logo-telkom-removebg-preview.png') }}" 
         alt="Logo Kantin Kita" 
         class="w-12 h-12 object-contain">

    <!-- TEXT -->
    <div class="-mt-1 leading-tight">
        <h1 class="font-bold text-lg">Kantin Kita</h1>
        <p class="text-xs text-gray-500">SMK Telkom Banjarbaru</p>
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
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
             stroke-width="2" stroke="currentColor"
             class="w-5 h-5 absolute left-3 text-gray-400">
            <path stroke-linecap="round" stroke-linejoin="round" 
                d="M21 21l-4.35-4.35m1.6-5.4a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </form>

    <!-- Navigation -->
    <div class="flex items-center gap-8 font-medium">

        <a href="{{ route('dashboard') }}" 
           class="{{ Route::is('dashboard') ? 'text-red-600 border-b-2 border-red-600 pb-1' : 'hover:text-red-600' }}">
            Beranda
        </a>

        @auth
        <a href="{{ route('user.menu.index') }}" 
           class="{{ Route::is(['user.menu.index', 'user.menu.show']) 
                ? 'text-red-600 border-b-2 border-red-600 pb-1' 
                : 'hover:text-red-600' }}">
            Menu
        </a>
        @endauth

     <a href="{{ route('tentangkita') }}">
    Tentang Kami
</a>



        <a href="{{ route('ulasan.index') }}" 
            class="{{ Route::is('ulasan.index') ? 'text-red-600 border-b-2 border-red-600 pb-1' : 'hover:text-red-600' }}">
            Ulasan
        </a>

        <!-- Profile Dropdown -->
        @auth
        <div x-data="{ open: false }" class="relative">

            <!-- Avatar Button -->
          <button @click="open = !open" 
    class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center text-white cursor-pointer">
    <x-carbon-user-avatar-filled class="w-6 h-6" />
</button>

            <!-- Dropdown -->
            <div 
                x-show="open"
                x-transition
                @click.outside="open = false"
                class="absolute right-0 mt-3 w-64 bg-white rounded-xl shadow-lg border py-3 z-50">

                <!-- User Info -->
                <div class="px-4 py-2 bg-white">
                    <p class="font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                    @if(Auth::user()->nis)
                        <p class="text-xs text-gray-500">{{ Auth::user()->nis }} - {{ Auth::user()->kelas }}</p>
                    @endif
                </div>
                <br> 

                <!-- Menu -->
                <a href="{{ route('user.profile') }}" 
                    class="block px-4 py-2 hover:bg-gray-100">
                    Akun Saya
                </a>

                <a href="{{ route('user.pesanan.index') }}" class="block px-4 py-2 hover:bg-gray-100">
    Pesanan
</a>



                <!-- Logout -->
                <hr>
               <button onclick="window.location='{{ route('logout') }}'"
        class="w-full text-left px-4 py-2 hover:bg-gray-100">
    Keluar
</button>


            </div>
        </div>
        @endauth

        @guest
        <a href="{{ route('login') }}">
            <div class="px-4 py-2 bg-red-600 text-white rounded-full cursor-pointer">
                Login
            </div>
        </a>
        @endguest
    </div>
</nav>

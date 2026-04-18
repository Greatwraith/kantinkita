<!-- ========================== -->
<!--   NAVBAR (NOT LOGIN)      -->
<!-- ========================== -->
<nav class="w-full fixed top-0 left-0 bg-white shadow-sm z-50">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">

        <!-- LOGO -->
        <div class="flex items-center gap-3 cursor-pointer" onclick="scrollToSection('home')">
            <img src="/images/static/logo.png" class="w-10">
            <h1 class="text-xl font-semibold text-gray-800">Kantin Kita</h1>
        </div>

        <!-- DESKTOP MENU -->
        <div class="hidden md:flex items-center gap-10 text-sm font-semibold">
            <button onclick="scrollToSection('home')" class="hover:text-[#b8141a] transition">Beranda</button>
            <button onclick="scrollToSection('menu')" class="hover:text-[#b8141a] transition">Menu</button>
            <button onclick="scrollToSection('tentangkita')" class="hover:text-[#b8141a] transition">Tentang Kami</button>
            <button onclick="scrollToSection('ulasan')" class="hover:text-[#b8141a] transition">Ulasan</button>
        </div>

        <!-- LOGIN BUTTON -->
        <a href="/login"
           class="hidden md:inline-block bg-[#b8141a] text-white px-6 py-2 rounded-xl font-semibold hover:bg-[#9a0f14] transition">
            Masuk
        </a>

        <!-- MOBILE MENU BUTTON -->
        <button onclick="toggleMobileNav()" class="md:hidden text-2xl">
            ☰
        </button>

    </div>

    <!-- MOBILE MENU -->
    <div id="mobileNav" class="hidden md:hidden bg-white shadow-inner flex flex-col px-6 pb-4 gap-3 text-sm font-semibold">
        <button onclick="scrollToSection('home'); toggleMobileNav()" class="py-2 border-b">Beranda</button>
        <button onclick="scrollToSection('menu'); toggleMobileNav()" class="py-2 border-b">Menu</button>
        <button onclick="scrollToSection('tentangkita'); toggleMobileNav()" class="py-2 border-b">Tentang Kami</button>
        <button onclick="scrollToSection('ulasan'); toggleMobileNav()" class="py-2 border-b">Ulasan</button>
        <a href="/login" class="py-2 text-[#b8141a] font-bold">Masuk</a>
    </div>
</nav>


<!-- ========================== -->
<!--   JS: SCROLL FUNCTION       -->
<!-- ========================== -->
<script>
function scrollToSection(section) {

    const idMap = {
        home: 'notlogin-herowelcome',
        menu: 'notlogin-menu',
        tentangkita: 'notlogin-tentangkita',
        ulasan: 'notlogin-ulasan'
    };

    const element = document.getElementById(idMap[section]);

    if (element) {
        window.scrollTo({
            top: element.offsetTop - 80, // supaya tidak ketutup navbar
            behavior: 'smooth'
        });
    }
}

function toggleMobileNav() {
    document.getElementById("mobileNav").classList.toggle("hidden");
}
</script>

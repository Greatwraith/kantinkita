<!-- ====================================== -->
<!--              PRODUK UNGGULAN           -->
<!-- ====================================== -->
<div class="w-full py-20 bg-white font-poppins" id="product-sections">

    <!-- TITLE -->
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold text-gray-900">Produk Unggulan</h1>
        <p class="text-gray-600 mt-2">Pilihan terbaik dari menu kami</p>
    </div>

    <!-- FILTER -->
    <div class="flex justify-center gap-4 mb-12">
        <button onclick="showCategory('all')" class="filter-btn px-5 py-2 rounded-full text-sm font-semibold shadow bg-[#b8141a] text-white">
            Semua
        </button>

        <button onclick="showCategory('makanan')" class="filter-btn px-5 py-2 rounded-full text-sm font-semibold shadow bg-white text-gray-700 border">
            Makanan
        </button>

        <button onclick="showCategory('minuman')" class="filter-btn px-5 py-2 rounded-full text-sm font-semibold shadow bg-white text-gray-700 border">
            Minuman
        </button>
    </div>


    <!-- ====================================================== -->
    <!--                     ALL PRODUCT LIST                   -->
    <!-- ====================================================== -->
    <div id="all" class="category-section grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 px-10">

        <!-- Basreng -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden relative">
            <div class="absolute right-4 top-4 bg-white p-2 rounded-full shadow">
                <i class="fa-regular fa-heart text-[#b8141a]"></i>
            </div>

            <img src="/images/static/basreng.jpg" class="w-full h-48 object-contain bg-white">

            <div class="p-4">
                <h3 class="text-lg font-semibold">Basreng Pedas</h3>

                <div class="flex items-center justify-between mt-1">
                    <p class="text-[#b8141a] font-semibold">Rp 6.000</p>
                    <a href="/login"
                       class="py-1 px-4 rounded-lg bg-[#b8141a] hover:bg-[#9a0f14] text-white text-sm font-semibold flex items-center gap-1">
                        <i class="fa-solid fa-cart-shopping"></i> Pesan
                    </a>
                </div>
            </div>
        </div>

        <!-- Ultra Milk -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden relative">
            <img src="/images/static/ultra-milk.jpg" class="w-full h-48 object-contain bg-white">

            <div class="p-4">
                <h3 class="text-lg font-semibold">Ultra Milk Strawberry</h3>

                <div class="flex items-center justify-between mt-1">
                    <p class="text-[#b8141a] font-semibold">Rp 5.000</p>
                    <a href="/login"
                       class="py-1 px-4 rounded-lg bg-[#b8141a] hover:bg-[#9a0f14] text-white text-sm font-semibold flex items-center gap-1">
                        <i class="fa-solid fa-cart-shopping"></i> Pesan
                    </a>
                </div>
            </div>
        </div>

        <!-- Risol -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden relative">
            <img src="/images/static/risol.jpg" class="w-full h-48 object-contain bg-white">

            <div class="p-4">
                <h3 class="text-lg font-semibold">Risol Mayo</h3>

                <div class="flex items-center justify-between mt-1">
                    <p class="text-[#b8141a] font-semibold">Rp 3.000</p>
                    <a href="/login"
                       class="py-1 px-4 rounded-lg bg-[#b8141a] hover:bg-[#9a0f14] text-white text-sm font-semibold flex items-center gap-1">
                        <i class="fa-solid fa-cart-shopping"></i> Pesan
                    </a>
                </div>
            </div>
        </div>

        <!-- Sandwich -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden relative">
            <img src="/images/static/sandwich.jpg" class="w-full h-48 object-contain bg-white">

            <div class="p-4">
                <h3 class="text-lg font-semibold">Sandwich</h3>

                <div class="flex items-center justify-between mt-1">
                    <p class="text-[#b8141a] font-semibold">Rp 7.000</p>
                    <a href="/login"
                       class="py-1 px-4 rounded-lg bg-[#b8141a] hover:bg-[#9a0f14] text-white text-sm font-semibold flex items-center gap-1">
                        <i class="fa-solid fa-cart-shopping"></i> Pesan
                    </a>
                </div>
            </div>
        </div>

    </div>



    <!-- ====================================================== -->
    <!--                       MAKANAN                         -->
    <!-- ====================================================== -->
    <div id="makanan" class="category-section hidden w-full py-20 bg-white px-10">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            <!-- Basreng -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden relative">
                <img src="/images/static/basreng.jpg" class="w-full h-48 object-contain bg-white">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">Basreng Pedas</h3>

                    <div class="flex items-center justify-between mt-1">
                        <p class="text-[#b8141a] font-semibold">Rp 6.000</p>
                        <a href="/login"
                           class="py-1 px-4 rounded-lg bg-[#b8141a] hover:bg-[#9a0f14] text-white text-sm font-semibold flex items-center gap-1">
                            <i class="fa-solid fa-cart-shopping"></i> Pesan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Risol -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden relative">
                <img src="/images/static/risol.jpg" class="w-full h-48 object-contain bg-white">

                <div class="p-4">
                    <h3 class="text-lg font-semibold">Risol Mayo</h3>

                    <div class="flex items-center justify-between mt-1">
                        <p class="text-[#b8141a] font-semibold">Rp 3.000</p>
                        <a href="/login"
                           class="py-1 px-4 rounded-lg bg-[#b8141a] hover:bg-[#9a0f14] text-white text-sm font-semibold flex items-center gap-1">
                            <i class="fa-solid fa-cart-shopping"></i> Pesan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sandwich -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden relative">
                <img src="/images/static/sandwich.jpg" class="w-full h-48 object-contain bg-white">

                <div class="p-4">
                    <h3 class="text-lg font-semibold">Sandwich</h3>

                    <div class="flex items-center justify-between mt-1">
                        <p class="text-[#b8141a] font-semibold">Rp 7.000</p>
                        <a href="/login"
                           class="py-1 px-4 rounded-lg bg-[#b8141a] hover:bg-[#9a0f14] text-white text-sm font-semibold flex items-center gap-1">
                            <i class="fa-solid fa-cart-shopping"></i> Pesan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Brownies -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden relative">
                <img src="/images/static/brownies.jpg" class="w-full h-48 object-contain bg-white">

                <div class="p-4">
                    <h3 class="text-lg font-semibold">Brownies</h3>

                    <div class="flex items-center justify-between mt-1">
                        <p class="text-[#b8141a] font-semibold">Rp 4.000</p>
                        <a href="/login"
                           class="py-1 px-4 rounded-lg bg-[#b8141a] hover:bg-[#9a0f14] text-white text-sm font-semibold flex items-center gap-1">
                            <i class="fa-solid fa-cart-shopping"></i> Pesan
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <!-- ====================================================== -->
    <!--                       MINUMAN                         -->
    <!-- ====================================================== -->
    <div id="minuman" class="category-section hidden w-full py-20 bg-white px-10">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            <!-- Ultra Milk -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden relative">
                <img src="/images/static/ultra-milk.jpg" class="w-full h-48 object-contain bg-white">

                <div class="p-4">
                    <h3 class="text-lg font-semibold">Ultra Milk Strawberry</h3>

                    <div class="flex items-center justify-between mt-1">
                        <p class="text-[#b8141a] font-semibold">Rp 5.000</p>
                        <a href="/login"
                           class="py-1 px-4 rounded-lg bg-[#b8141a] hover:bg-[#9a0f14] text-white text-sm font-semibold flex items-center gap-1">
                            <i class="fa-solid fa-cart-shopping"></i> Pesan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Milo -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden relative">
                <img src="/images/static/milo.jpg" class="w-full h-48 object-contain bg-white">

                <div class="p-4">
                    <h3 class="text-lg font-semibold">Milo Original</h3>

                    <div class="flex items-center justify-between mt-1">
                        <p class="text-[#b8141a] font-semibold">Rp 5.000</p>
                        <a href="/login"
                           class="py-1 px-4 rounded-lg bg-[#b8141a] hover:bg-[#9a0f14] text-white text-sm font-semibold flex items-center gap-1">
                            <i class="fa-solid fa-cart-shopping"></i> Pesan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Air Mineral -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden relative">
                <img src="/images/static/aqua.jpg" class="w-full h-48 object-contain bg-white">

                <div class="p-4">
                    <h3 class="text-lg font-semibold">Air Mineral</h3>

                    <div class="flex items-center justify-between mt-1">
                        <p class="text-[#b8141a] font-semibold">Rp 3.000</p>
                        <a href="/login"
                           class="py-1 px-4 rounded-lg bg-[#b8141a] hover:bg-[#9a0f14] text-white text-sm font-semibold flex items-center gap-1">
                            <i class="fa-solid fa-cart-shopping"></i> Pesan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Golda -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden relative">
                <img src="/images/static/golda.jpg" class="w-full h-48 object-contain bg-white">

                <div class="p-4">
                    <h3 class="text-lg font-semibold">Golda Dolce Latte</h3>

                    <div class="flex items-center justify-between mt-1">
                        <p class="text-[#b8141a] font-semibold">Rp 5.000</p>
                        <a href="/login"
                           class="py-1 px-4 rounded-lg bg-[#b8141a] hover:bg-[#9a0f14] text-white text-sm font-semibold flex items-center gap-1">
                            <i class="fa-solid fa-cart-shopping"></i> Pesan
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>


<!-- SCRIPT -->
<script>
function showCategory(cat) {

    document.querySelectorAll(".category-section")
        .forEach(el => el.classList.add("hidden"));

    document.getElementById(cat).classList.remove("hidden");

    document.querySelectorAll(".filter-btn")
        .forEach(btn => {
            btn.classList.remove("bg-[#b8141a]", "text-white");
            btn.classList.add("bg-white", "text-gray-700", "border");
        });

    event.target.classList.add("bg-[#b8141a]", "text-white");
    event.target.classList.remove("bg-white", "text-gray-700", "border");
}
</script>

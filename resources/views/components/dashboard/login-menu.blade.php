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

            <img src="https://id-live-01.slatic.net/p/aa811a86c3067597010617bbe9e42f3a.jpg"
                 class="w-full h-48 object-cover">

            <div class="p-4">
                <h3 class="text-lg font-semibold">Basreng Pedas</h3>

                <div class="flex items-center justify-between mt-1">
                    <p class="text-[#b8141a] font-semibold">Rp 6.000</p>
                    <a href="/menu"
                       class="py-1 px-4 rounded-lg bg-[#b8141a] hover:bg-[#9a0f14] text-white text-sm font-semibold flex items-center gap-1">
                        <x-ionicon-cart-outline class="w-5 h-5"/> Pesan
                    </a>
                </div>
            </div>
        </div>

        <!-- Ultra Milk -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden relative">
            <img src="https://image.astronauts.cloud/product-images/2024/4/UltraMilkUHTStrawberrySusuUHT1_654139ee-07d1-41ea-a82d-bd329935e8d8_900x900.jpeg"
                 class="w-full h-48 object-cover">

            <div class="p-4">
                <h3 class="text-lg font-semibold">Ultra Milk Strawberry</h3>

                <div class="flex items-center justify-between mt-1">
                    <p class="text-[#b8141a] font-semibold">Rp 5.000</p>
                    <a href="/menu"
                       class="py-1 px-4 rounded-lg bg-[#b8141a] hover:bg-[#9a0f14] text-white text-sm font-semibold flex items-center gap-1">
                        <x-ionicon-cart-outline class="w-5 h-5"/> Pesan
                    </a>
                </div>
            </div>
        </div>

        <!-- Risol -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden relative">
            <img src="https://png.pngtree.com/png-vector/20250707/ourmid/pngtree-indonesian-savory-snack-risoles-with-cheese-filling-risol-mayo-png-image_16716027.webp"
                 class="w-full h-48 object-cover">

            <div class="p-4">
                <h3 class="text-lg font-semibold">Risol Mayo</h3>

                <div class="flex items-center justify-between mt-1">
                    <p class="text-[#b8141a] font-semibold">Rp 3.000</p>
                    <a href="/menu"
                       class="py-1 px-4 rounded-lg bg-[#b8141a] hover:bg-[#9a0f14] text-white text-sm font-semibold flex items-center gap-1">
                        <x-ionicon-cart-outline class="w-5 h-5"/> Pesan
                    </a>
                </div>
            </div>
        </div>

        <!-- Sandwich -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden relative">
            <img src="https://static.toiimg.com/thumb/83740315.cms?imgsize=361903&width=800&height=800"
                 class="w-full h-48 object-cover">

            <div class="p-4">
                <h3 class="text-lg font-semibold">Sandwich</h3>

                <div class="flex items-center justify-between mt-1">
                    <p class="text-[#b8141a] font-semibold">Rp 7.000</p>
                    <a href="/menu"
                       class="py-1 px-4 rounded-lg bg-[#b8141a] hover:bg-[#9a0f14] text-white text-sm font-semibold flex items-center gap-1">
                        <x-ionicon-cart-outline class="w-5 h-5"/> Pesan
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
                <img src="https://id-live-01.slatic.net/p/aa811a86c3067597010617bbe9e42f3a.jpg"
                     class="w-full h-48 object-cover">

                <div class="p-4">
                    <h3 class="text-lg font-semibold">Basreng Pedas</h3>

                    <div class="flex items-center justify-between mt-1">
                        <p class="text-[#b8141a] font-semibold">Rp 6.000</p>
                        <a href="/menu"
                           class="py-1 px-4 rounded-lg bg-[#b8141a] hover:bg-[#9a0f14] text-white text-sm font-semibold flex items-center gap-1">
                            <x-ionicon-cart-outline class="w-5 h-5"/> Pesan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Risol -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden relative">
                <img src="https://png.pngtree.com/png-vector/20250707/ourmid/pngtree-indonesian-savory-snack-risoles-with-cheese-filling-risol-mayo-png-image_16716027.webp"
                     class="w-full h-48 object-cover">

                <div class="p-4">
                    <h3 class="text-lg font-semibold">Risol Mayo</h3>

                    <div class="flex items-center justify-between mt-1">
                        <p class="text-[#b8141a] font-semibold">Rp 3.000</p>
                        <a href="/menu"
                           class="py-1 px-4 rounded-lg bg-[#b8141a] hover:bg-[#9a0f14] text-white text-sm font-semibold flex items-center gap-1">
                            <x-ionicon-cart-outline class="w-5 h-5"/> Pesan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sandwich -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden relative">
                <img src="https://static.toiimg.com/thumb/83740315.cms?imgsize=361903&width=800&height=800"
                     class="w-full h-48 object-cover">

                <div class="p-4">
                    <h3 class="text-lg font-semibold">Sandwich</h3>

                    <div class="flex items-center justify-between mt-1">
                        <p class="text-[#b8141a] font-semibold">Rp 7.000</p>
                        <a href="/menu"
                           class="py-1 px-4 rounded-lg bg-[#b8141a] hover:bg-[#9a0f14] text-white text-sm font-semibold flex items-center gap-1">
                            <x-ionicon-cart-outline class="w-5 h-5"/> Pesan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Brownies -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden relative">
                <img src="https://d12man5gwydfvl.cloudfront.net/wp-content/uploads/2020/02/HappyFresh_resep_brownies_kukus.jpg"
                     class="w-full h-48 object-cover">

                <div class="p-4">
                    <h3 class="text-lg font-semibold">Brownies</h3>

                    <div class="flex items-center justify-between mt-1">
                        <p class="text-[#b8141a] font-semibold">Rp 4.000</p>
                        <a href="/menu"
                           class="py-1 px-4 rounded-lg bg-[#b8141a] hover:bg-[#9a0f14] text-white text-sm font-semibold flex items-center gap-1">
                            <x-ionicon-cart-outline class="w-5 h-5"/> Pesan
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
                <img src="https://image.astronauts.cloud/product-images/2024/4/UltraMilkUHTStrawberrySusuUHT1_654139ee-07d1-41ea-a82d-bd329935e8d8_900x900.jpeg"
                     class="w-full h-48 object-cover">

                <div class="p-4">
                    <h3 class="text-lg font-semibold">Ultra Milk Strawberry</h3>

                    <div class="flex items-center justify-between mt-1">
                        <p class="text-[#b8141a] font-semibold">Rp 5.000</p>
                        <a href="/menu"
                           class="py-1 px-4 rounded-lg bg-[#b8141a] hover:bg-[#9a0f14] text-white text-sm font-semibold flex items-center gap-1">
                            <x-ionicon-cart-outline class="w-5 h-5"/> Pesan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Milo -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden relative">
                <img src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full/catalog-image/89/MTA-158220150/br-m036969-02161_milo-rtd-activ-go-original-tin-220ml_full01-f8905e49.jpg"
                     class="w-full h-48 object-cover">

                <div class="p-4">
                    <h3 class="text-lg font-semibold">Milo Original</h3>

                    <div class="flex items-center justify-between mt-1">
                        <p class="text-[#b8141a] font-semibold">Rp 5.000</p>
                        <a href="/menu"
                           class="py-1 px-4 rounded-lg bg-[#b8141a] hover:bg-[#9a0f14] text-white text-sm font-semibold flex items-center gap-1">
                            <x-ionicon-cart-outline class="w-5 h-5"/> Pesan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Air Mineral -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden relative">
                <img src="https://drivethru.klikindomaret.com/tz0m/wp-content/uploads/sites/23/2021/05/le-minerale-600ml-1.jpg"
                     class="w-full h-48 object-cover">

                <div class="p-4">
                    <h3 class="text-lg font-semibold">Air Mineral</h3>

                    <div class="flex items-center justify-between mt-1">
                        <p class="text-[#b8141a] font-semibold">Rp 3.000</p>
                        <a href="/menu"
                           class="py-1 px-4 rounded-lg bg-[#b8141a] hover:bg-[#9a0f14] text-white text-sm font-semibold flex items-center gap-1">
                            <x-ionicon-cart-outline class="w-5 h-5"/> Pesan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Golda -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden relative">
                <img src="https://down-id.img.susercontent.com/file/5954aaefe31c710c6bcf407cfe847618"
                     class="w-full h-48 object-cover">

                <div class="p-4">
                    <h3 class="text-lg font-semibold">Golda Dolce Latte</h3>

                    <div class="flex items-center justify-between mt-1">
                        <p class="text-[#b8141a] font-semibold">Rp 5.000</p>
                        <a href="/menu"
                           class="py-1 px-4 rounded-lg bg-[#b8141a] hover:bg-[#9a0f14] text-white text-sm font-semibold flex items-center gap-1">
                            <x-ionicon-cart-outline class="w-5 h-5"/> Pesan
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

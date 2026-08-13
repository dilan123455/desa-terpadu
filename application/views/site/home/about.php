    <!-- Section Judul Utama -->
 <section id="about" class="bg-white py-16 md:py-24 px-4 text-center">
        <div class="max-w-4xl mx-auto">
            <p class="text-red-500 text-lg md:text-xl font-medium tracking-wide">Tentang Desa Terpadu</p>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3">Satu Solusi, Semua Terintegrasi</h2>
            <p class="text-gray-700 text-base md:text-lg leading-relaxed mt-6">
                Platform digital yang dirancang khusus untuk memudahkan pengelolaan administrasi, pelayanan publik, dan komunikasi di tingkat desa.
            </p>
        </div>
    </section>

    <!-- Carousel -->
    <div class="bg-[#f4eae6] py-8 md:py-10">
        <div class="swiper mySwiper w-full max-w-5xl mx-auto px-4">
            <div class="swiper-wrapper">
                <div class="swiper-slide flex justify-center">
                    <img src="https://desaterpadu.id/wp-content/uploads/2025/08/website-informasi-desa-mockup-1024x578.png" class="rounded-2xl shadow-xl border border-white/20 object-cover w-full h-auto" alt="Website">
                </div>
                <div class="swiper-slide flex justify-center">
                    <img src="https://desaterpadu.id/wp-content/uploads/2025/08/dashboard-administrasi-kependudukan-1024x577.png" class="rounded-2xl shadow-xl border border-white/20 object-cover w-full h-auto" alt="Admin">
                </div>
                <div class="swiper-slide flex justify-center">
                    <img src="https://desaterpadu.id/wp-content/uploads/2025/08/dashboard-CMS-1024x577.png" class="rounded-2xl shadow-xl border border-white/20 object-cover w-full h-auto" alt="CMS">
                </div>
                <div class="swiper-slide flex justify-center">
                    <img src="https://desaterpadu.id/wp-content/uploads/2025/08/dashboard-superapp-1024x577.png" class="rounded-2xl shadow-xl border border-white/20 object-cover w-full h-auto" alt="Superapp">
                </div>
            </div>
            <div class="swiper-button-next !text-[#2b2b2b] after:!text-xl hidden md:flex"></div>
            <div class="swiper-button-prev !text-[#2b2b2b] after:!text-xl hidden md:flex"></div>
        </div>
        <!-- Pagination di luar Swiper -->
        <div class="custom-pagination" id="customPagination"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            centeredSlides: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: "#customPagination",
                clickable: true,
                renderBullet: function (index, className) {
                    return '<span class="' + className + '"></span>';
                },
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>


    <!-- BENEFITS SECTION -->
    <section class="py-16 md:py-20 px-4 bg-white">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Manfaat Nyata untuk Desa Anda</h2>
            <p class="text-gray-600 mb-12">Satu platform, berbagai kemudahan yang bisa dirasakan langsung.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Benefit 1 -->
                <div class="border border-gray-200 rounded-lg p-6 text-left flex gap-4 bg-white hover:shadow-md transition duration-300">
                    <div class="text-[#D94A4A] text-4xl font-bold flex-shrink-0">1</div>
                    <div>
                        <h4 class="font-semibold text-gray-800 text-lg">Efisiensi</h4>
                        <p class="text-gray-600 text-sm mt-1 leading-relaxed">Proses administrasi lebih cepat, mengurangi birokrasi dan tumpukan kertas.</p>
                    </div>
                </div>

                <!-- Benefit 2 -->
                <div class="border border-gray-200 rounded-lg p-6 text-left flex gap-4 bg-white hover:shadow-md transition duration-300">
                    <div class="text-[#D94A4A] text-4xl font-bold flex-shrink-0">2</div>
                    <div>
                        <h4 class="font-semibold text-gray-800 text-lg">Transparansi</h4>
                        <p class="text-gray-600 text-sm mt-1 leading-relaxed">Pengelolaan data yang terelusur dan informasi lebih terbuka serta akurat.</p>
                    </div>
                </div>

                <!-- Benefit 3 -->
                <div class="border border-gray-200 rounded-lg p-6 text-left flex gap-4 bg-white hover:shadow-md transition duration-300">
                    <div class="text-[#D94A4A] text-4xl font-bold flex-shrink-0">3</div>
                    <div>
                        <h4 class="font-semibold text-gray-800 text-lg">Pengambilan Keputusan</h4>
                        <p class="text-gray-600 text-sm mt-1 leading-relaxed">Data penduduk dan potensi desa terdigitalisasi dengan baik.</p>
                    </div>
                </div>

                <!-- Benefit 4 -->
                <div class="border border-gray-200 rounded-lg p-6 text-left flex gap-4 bg-white hover:shadow-md transition duration-300">
                    <div class="text-[#D94A4A] text-4xl font-bold flex-shrink-0">4</div>
                    <div>
                        <h4 class="font-semibold text-gray-800 text-lg">Peningkatan SDM Desa</h4>
                        <p class="text-gray-600 text-sm mt-1 leading-relaxed">Mendorong peningkatan keterampilan digital perangkat desa & masyarakat.</p>
                    </div>
                </div>

                <!-- Benefit 5 -->
                <div class="border border-gray-200 rounded-lg p-6 text-left flex gap-4 bg-white hover:shadow-md transition duration-300 lg:col-span-1">
                    <div class="text-[#D94A4A] text-4xl font-bold flex-shrink-0">5</div>
                    <div>
                        <h4 class="font-semibold text-gray-800 text-lg">Siap Untuk Masa Depan</h4>
                        <p class="text-gray-600 text-sm mt-1 leading-relaxed">Desa yang mandiri, inovatif, dan adaptif terhadap perkembangan teknologi.</p>
                    </div>
                </div>
            </div>
        </div>
</section>

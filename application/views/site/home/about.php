<!-- Section Judul Utama -->
<section id="about" class="bg-white py-16 md:py-24 px-4 text-center">
    <div class="max-w-4xl mx-auto">
        <p class="text-red-500 text-lg md:text-xl font-medium tracking-wide">
            Tentang Desa Terpadu
        </p>
        <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3">
            <?= html_escape($about->title); ?>
        </h2>
        <p class="text-gray-700 text-base md:text-lg leading-relaxed mt-6">
            <?= html_escape($about->description); ?>
        </p>
    </div>
</section>

<!-- Carousel -->
<div class="bg-[#f4eae6] py-8 md:py-10">
    <div class="swiper mySwiper w-full max-w-5xl mx-auto px-4">
        <div class="swiper-wrapper">
            <?php foreach ($slides as $slide): ?>
                <div class="swiper-slide flex justify-center">
                    <img
                        src="<?= base_url('assets/uploads/about/' . $slide->image); ?>"
                        class="rounded-2xl shadow-xl border border-white/20 object-cover w-full h-auto"
                        alt="<?= html_escape($slide->title); ?>"
                        loading="lazy"
                        decoding="async"
                        fetchpriority="low"
                    >
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-button-next !text-[#2b2b2b] after:!text-xl hidden md:flex"></div>
        <div class="swiper-button-prev !text-[#2b2b2b] after:!text-xl hidden md:flex"></div>
    </div>
    <!-- Pagination di luar Swiper -->
    <div class="custom-pagination" id="customPagination"></div>
</div>

<!-- Script Swiper dimuat secara lazy -->
<script>
    (function() {
        const swiperContainer = document.querySelector('.mySwiper');
        if (!swiperContainer) return;

        function initSwiper() {
            if (window.Swiper) {
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
            } else {
                // Muat script Swiper secara dinamis
                const script = document.createElement('script');
                script.src = 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js';
                script.onload = function() {
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
                };
                script.onerror = function() {
                    console.error('Gagal memuat Swiper dari CDN.');
                };
                document.body.appendChild(script);
            }
        }

        // Lazy load Swiper dengan IntersectionObserver
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries, obs) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        initSwiper();
                        obs.unobserve(entry.target);
                    }
                });
            }, {
                rootMargin: '200px' // mulai inisialisasi 200px sebelum terlihat
            });
            observer.observe(swiperContainer);
        } else {
            // Fallback untuk browser lama
            initSwiper();
        }
    })();
</script>

<!-- BENEFITS SECTION -->
<style>
    /* Animasi reveal hanya untuk kartu benefit */
    .reveal-benefit {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }

    .reveal-benefit.visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<section class="py-16 md:py-20 px-4 bg-white">
    <div class="max-w-6xl mx-auto text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Manfaat Nyata untuk Desa Anda</h2>
        <p class="text-gray-600 mb-12">Satu platform, berbagai kemudahan yang bisa dirasakan langsung.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($benefits as $index => $benefit): ?>
                <div class="border border-gray-200 rounded-lg p-6 text-left flex gap-4 bg-white hover:shadow-md transition duration-300 reveal-benefit">
                    <div class="text-[#D94A4A] text-4xl font-bold flex-shrink-0">
                        <?= $index + 1; ?>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800 text-lg">
                            <?= html_escape($benefit->title); ?>
                        </h4>
                        <p class="text-gray-600 text-sm mt-1 leading-relaxed">
                            <?= html_escape($benefit->description); ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Script untuk reveal animation kartu Benefit -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const revealBenefits = document.querySelectorAll('.reveal-benefit');

        if ('IntersectionObserver' in window) {
            const benefitObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            revealBenefits.forEach(el => benefitObserver.observe(el));
        } else {
            // Fallback: langsung tampilkan
            revealBenefits.forEach(el => el.classList.add('visible'));
        }
    });
</script>
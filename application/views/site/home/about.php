<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
       * {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial, sans-serif;
    color: #1e293b;
    background: #ffffff;
}

/* =========================
   HERO ABOUT
========================= */

.about-hero {
    padding: 90px 20px 80px;
    background: linear-gradient(
        180deg,
        #ffffff 0%,
        #f8fafc 100%
    );
    text-align: center;
}

.about-container {
    max-width: 1000px;
    margin: 0 auto;
}

.about-label {
    display: inline-block;
    margin-bottom: 14px;
    color: #cc4b4d;
    font-size: 15px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
}

.about-title {
    margin: 0;
    font-size: 44px;
    line-height: 1.2;
    font-weight: 800;
    color: #111827;
}

.about-description {
    max-width: 720px;
    margin: 22px auto 0;
    color: #64748b;
    font-size: 17px;
    line-height: 1.8;
}


/* =========================
   SLIDER
========================= */

.about-carousel-section {
    padding: 25px 20px 35px;
    background: #ffffff;
}

.about-carousel-box {
    max-width: 1250px;
    margin: 0 auto;
    padding: 22px 60px 14px;
    background: #f4eae6;
}

.about-carousel-container {
    max-width: 1080px;
    margin: 0 auto;
}

.mySwiper {
    width: 100%;
    padding: 0 !important;
}

.swiper-slide {
    display: flex;
    justify-content: center;
    align-items: center;
}

.about-slide-image {
    width: 100%;
    max-height: 580px;
    object-fit: cover;
    border-radius: 20px;
    display: block;
    box-shadow: 0 20px 45px rgba(15, 23, 42, 0.15);
    border: 5px solid rgba(255, 255, 255, 0.8);
}

/* =========================
   NAVIGATION
========================= */

.swiper-button-next,
.swiper-button-prev {
    color: #2b2b2b !important;
}

.swiper-button-next::after,
.swiper-button-prev::after {
    font-size: 22px !important;
}




/* =========================
   PAGINATION
========================= */

.custom-pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    margin-top: 25px;
}

.custom-pagination .swiper-pagination-bullet {
    width: 10px;
    height: 10px;
    background: #cbd5e1;
    opacity: 1;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.3s ease;
}

.custom-pagination .swiper-pagination-bullet-active {
    width: 28px;
    border-radius: 10px;
    background: #cc4b4d !important;
}


/* =========================
   BENEFITS
========================= */

.benefits-section {
    padding: 90px 20px;
    background: #ffffff;
}

.benefits-container {
    max-width: 1100px;
    margin: 0 auto;
}

.benefits-header {
    text-align: center;
    margin-bottom: 50px;
}

.benefits-label {
    display: inline-block;
    margin-bottom: 10px;
    color: #cc4b4d;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
}

.benefits-title {
    margin: 0 0 12px;
    font-size: 36px;
    font-weight: 800;
    color: #111827;
}

.benefits-description {
    margin: 0 auto;
    max-width: 650px;
    color: #64748b;
    font-size: 16px;
    line-height: 1.7;
}


/* =========================
   BENEFIT GRID
========================= */

.benefits-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.benefit-card {
    position: relative;
    padding: 30px;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 18px;
    box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
    transition: all 0.25s ease;
}

.benefit-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 35px rgba(15, 23, 42, 0.10);
    border-color: #fecaca;
}

.benefit-number {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    border-radius: 12px;
    background: #fef2f2;
    color: #cc4b4d;
    font-size: 20px;
    font-weight: 800;
}

.benefit-title {
    margin: 0 0 10px;
    font-size: 20px;
    color: #1e293b;
}

.benefit-content {
    margin: 0;
    color: #64748b;
    font-size: 14px;
    line-height: 1.7;
}


/* =========================
   RESPONSIVE
========================= */

@media (max-width: 900px) {

    .about-title {
        font-size: 36px;
    }

    .benefits-grid {
        grid-template-columns: repeat(2, 1fr);
    }

}

@media (max-width: 600px) {

    .about-hero {
        padding: 65px 18px;
    }

    .about-title {
        font-size: 30px;
    }

    .about-description {
        font-size: 15px;
    }

    .about-slider-section {
        padding: 35px 15px 50px;
    }

    .about-slide-image {
        border-radius: 14px;
    }

    .benefits-section {
        padding: 65px 15px;
    }

    .benefits-title {
        font-size: 28px;
    }

    .benefits-grid {
        grid-template-columns: 1fr;
    }

}
    </style>
</head>
<body>

<section class="about-hero">

    <div class="about-container">

        <span class="about-label">
            Tentang Desa Terpadu
        </span>

        <h1 class="about-title">
            <?= html_escape($about->title); ?>
        </h1>

        <p class="about-description">
            <?= html_escape($about->description); ?>
        </p>

    </div>

</section>




<!-- =========================
     CAROUSEL
========================= -->

<section class="about-carousel-section">

    <div class="about-carousel-box">

        <div class="about-carousel-container">

            <div class="swiper mySwiper">

                <div class="swiper-wrapper">

                    <?php foreach ($slides as $slide): ?>

                        <div class="swiper-slide">

                            <img
                                src="<?= base_url('assets/uploads/about/' . $slide->image); ?>"
                                class="about-slide-image"
                                alt="<?= html_escape($slide->title); ?>"
                            >

                        </div>

                    <?php endforeach; ?>

                </div>

                <!-- Tombol Next -->
                <div class="swiper-button-next !text-[#2b2b2b] after:!text-xl hidden md:flex"></div>

                <!-- Tombol Previous -->
                <div class="swiper-button-prev !text-[#2b2b2b] after:!text-xl hidden md:flex"></div>

                <br>
                    <!-- Titik pagination -->
                 <div class="custom-pagination" id="customPagination"></div>

            </div>

        </div>

        <!-- Pagination -->
        <div
            class="custom-pagination"
            id="customPagination">
        </div>

    </div>

</section>

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
</body>
</html>
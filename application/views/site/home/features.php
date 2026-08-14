<style>
    .wave-top {
        transform: scaleY(-1);
    }

    .tab-button {
        position: relative;
        color: #ffffff;
        padding: 12px 20px;
        font-size: 1.5rem;
        font-weight: 700;
        transition: color 0.3s ease, transform 0.3s ease;
        cursor: pointer;
    }

    .tab-button::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 4px;
        background: transparent;
        transform: scaleX(0);
        transform-origin: center;
        transition: transform 0.3s ease, background 0.3s ease;
    }

    .tab-button:hover {
        color: #ffe0a3;
    }

    .tab-button.active {
        color: #ffe0a3;
    }

    .tab-button.active::after {
        background: #ffe0a3;
        transform: scaleX(1);
    }

    .tab-content {
        animation: fadeIn 0.45s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(15px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .feature-image {
        transition: transform 0.4s ease;
    }

    .feature-image:hover {
        transform: translateY(-5px);
    }

    .mobile-icon {
        transition: transform 0.3s ease;
    }

    .tab-button.active .mobile-icon {
        transform: rotate(45deg);
    }
</style>


<section
    id="features"
    class="relative bg-[#cc4b4d] min-h-[1000px] md:min-h-[1300px] lg:min-h-[1500px] overflow-hidden pt-20 pb-48 md:pb-64 scroll-mt-20"
>

    <!-- =====================================================
         WAVE ATAS
    ====================================================== -->

    <svg
        class="absolute top-0 left-0 w-full h-40 md:h-64 pointer-events-none block wave-top"
        style="margin-top: -2px;"
        viewBox="0 0 1440 320"
        preserveAspectRatio="none"
        xmlns="http://www.w3.org/2000/svg"
    >
        <path
            fill="#ffffff"
            d="M0,180 C180,340 360,60 540,140 C720,220 900,20 1080,120 C1200,180 1320,200 1440,180 L1440,320 L0,320 Z"
        />
    </svg>


    <div class="relative z-10 max-w-7xl mx-auto px-6">


        <!-- =================================================
             JUDUL
        ================================================== -->

        <div class="text-center pt-24 md:pt-32 lg:pt-36">

            <p class="text-[#ffe0a3] text-xl md:text-2xl lg:text-3xl font-semibold">
                Fitur Unggulan Desa Terpadu
            </p>

            <h1 class="mt-3 text-white text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold leading-tight">
                Tiga Platform Dalam Satu Ekosistem
            </h1>

        </div>


        <!-- =================================================
             TOMBOL PLATFORM
        ================================================== -->

        <div
            class="mt-14 md:mt-16 flex flex-col md:flex-row justify-center items-center gap-4 md:gap-8 w-full"
        >

            <?php if (!empty($platforms)): ?>

                <?php foreach ($platforms as $index => $platform): ?>

                    <button
                        type="button"
                        class="tab-button
                            <?= $index === 0 ? 'active' : ''; ?>
                            w-full md:w-auto
                            text-left md:text-center
                            flex justify-between md:justify-center
                            items-center
                            border-b md:border-b-0
                            border-white/10
                            pb-4 md:pb-0"
                        data-tab="platform-<?= $platform->id; ?>"
                    >

                        <?= html_escape($platform->name); ?>

                        <span class="mobile-icon md:hidden text-2xl font-light">
                            +
                        </span>

                    </button>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>


        <!-- =================================================
             KONTEN PLATFORM
        ================================================== -->

        <?php if (!empty($platforms)): ?>

            <?php foreach ($platforms as $index => $platform): ?>

                <?php
                    $platform_items = [];

                    if (!empty($feature_items)) {
                        foreach ($feature_items as $item) {
                            if ($item->platform_id == $platform->id) {
                                $platform_items[] = $item;
                            }
                        }
                    }
                ?>


                <div
                    id="platform-<?= $platform->id; ?>"
                    class="tab-content w-full mt-10 md:mt-14 <?= $index !== 0 ? 'hidden' : ''; ?>"
                >

                    <!-- =================================================
                         DESCRIPTION PLATFORM
                    ================================================== -->

                    <p class="max-w-6xl mx-auto text-center text-white text-lg md:text-xl lg:text-2xl leading-relaxed">

                        <?= nl2br(html_escape($platform->description)); ?>

                    </p>


                    <!-- =================================================
                         IMAGE PLATFORM
                    ================================================== -->

                    <?php if (!empty($platform->image)): ?>

                        <div class="mt-10 md:mt-14 flex justify-center">

                            <img
                                src="<?= html_escape($platform->image); ?>"
                                alt="<?= html_escape($platform->name); ?>"
                                class="feature-image w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg rounded-2xl"
                            >

                        </div>

                    <?php endif; ?>


                    <!-- =================================================
                         FEATURE ITEMS
                    ================================================== -->

                    <?php if (!empty($platform_items)): ?>

                        <div
                            class="mt-10 md:mt-14 max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-8 md:gap-y-10"
                        >

                            <?php foreach ($platform_items as $item): ?>

                                <div class="flex flex-row items-start gap-3 text-left">

                                    <!-- ICON -->

                                    <div
                                        class="bg-white rounded-2xl p-2 w-12 h-12 md:w-14 md:h-14 flex-shrink-0 flex items-center justify-center shadow-sm"
                                    >

                                        <?php if (!empty($item->icon)): ?>

                                            <img
                                                src="<?= html_escape($item->icon); ?>"
                                                class="w-full h-full object-contain"
                                                alt="<?= html_escape($item->title); ?>"
                                            >

                                        <?php else: ?>

                                            <span class="text-[#cc4b4d] text-xl">
                                                ⭐
                                            </span>

                                        <?php endif; ?>

                                    </div>


                                    <!-- TEXT -->

                                    <div class="flex flex-col">

                                        <h4 class="text-white font-bold text-base md:text-lg leading-tight">

                                            <?= html_escape($item->title); ?>

                                        </h4>

                                        <p class="text-white/90 text-sm leading-snug mt-1">

                                            <?= nl2br(html_escape($item->description)); ?>

                                        </p>

                                    </div>

                                </div>

                            <?php endforeach; ?>

                        </div>

                    <?php endif; ?>


                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <!-- =================================================
                 JIKA BELUM ADA PLATFORM
            ================================================== -->

            <div class="text-center text-white mt-16">

                <p class="text-lg">
                    Belum ada data fitur yang tersedia.
                </p>

            </div>

        <?php endif; ?>

    </div>


    <!-- =====================================================
         WAVE BAWAH
    ====================================================== -->

    <svg
        class="absolute bottom-0 left-0 w-full h-60 md:h-80 pointer-events-none block"
        style="margin-bottom: -2px;"
        viewBox="0 0 1440 320"
        preserveAspectRatio="none"
        xmlns="http://www.w3.org/2000/svg"
    >

        <path
            fill="#ffffff"
            d="M0,180 C180,340 360,60 540,140 C720,220 900,20 1080,120 C1200,180 1320,200 1440,180 L1440,320 L0,320 Z"
        />

    </svg>

</section>


<!-- =====================================================
     JAVASCRIPT TAB
====================================================== -->

<script>
    document.addEventListener("DOMContentLoaded", function () {

        const buttons = document.querySelectorAll(".tab-button");
        const contents = document.querySelectorAll(".tab-content");


        buttons.forEach(function (button) {

            button.addEventListener("click", function () {

                const target = this.getAttribute("data-tab");


                // Hapus active dari semua tombol
                buttons.forEach(function (btn) {
                    btn.classList.remove("active");
                });


                // Sembunyikan semua konten
                contents.forEach(function (content) {
                    content.classList.add("hidden");
                });


                // Aktifkan tombol yang diklik
                this.classList.add("active");


                // Tampilkan konten yang sesuai
                const selectedContent =
                    document.getElementById(target);


                if (selectedContent) {
                    selectedContent.classList.remove("hidden");
                }

            });

        });

    });
</script>